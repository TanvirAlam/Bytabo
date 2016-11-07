<?php
session_start();


$UID = $_SESSION['UID'];
$HID = $_SESSION['HID'];
$CurrDate = date("Y-m-d H:i:s"); //Current Timestamp

//there might be few secusrity issues

// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Support CORS
// header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; // finish preflight CORS requests here
}


if ( !empty($_REQUEST[ 'debug' ]) ) {
    $random = rand(0, intval($_REQUEST[ 'debug' ]) );
    if ( $random === 0 ) {
        header("HTTP/1.0 500 Internal Server Error");
        exit;
    }
}

// header("HTTP/1.0 500 Internal Server Error");
// exit;


// 5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
$targetDir = './upload_tmp';

$uploadDir = './upload';
$uploadDirUser = "./upload/".$UID;
$uploadDirUserAd = "./upload/".$UID."/".$HID."/";
$uploadDirUserAdThumb = "./upload/".$UID."/".$HID."/thumbnails";

$cleanupTargetDir = true; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
if (!file_exists($targetDir)) {
    @mkdir($targetDir);
}

// Create target dir
if (!file_exists($uploadDir)) {
    @mkdir($uploadDir);
}

if (!file_exists($uploadDirUser)) {
    @mkdir($uploadDirUser);
}

if (!file_exists($uploadDirUserAd)) {
    @mkdir($uploadDirUserAd);
}

if (!file_exists($uploadDirUserAdThumb)) {
    @mkdir($uploadDirUserAdThumb);
}

// Get a file name
if (isset($_REQUEST["name"])) {
    $fileName = $_REQUEST["name"];
} elseif (!empty($_FILES)) {
    $fileName = $_FILES["file"]["name"];
} else {
    $fileName = uniqid("file_");
}
//var_dump($fileName);


$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
$uploadPath = $uploadDirUserAd . DIRECTORY_SEPARATOR . $fileName;
$uploadPathThumb = $uploadDirUserAdThumb . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


// Remove old temp files
if ($cleanupTargetDir) {
    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
    }

    while (($file = readdir($dir)) !== false) {
        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

        // If temp file is current file proceed to the next
        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
            continue;
        }

        // Remove temp file if it is older than the max age and is not the current file
        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
            @unlink($tmpfilePath);
        }
    }
    closedir($dir);
}


// Open temp file
if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
    }

    // Read binary input stream and append it to temp file
    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
} else {
    if (!$in = @fopen("php://input", "rb")) {
        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
    }
}

while ($buff = fread($in, 4096)) {
    fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

$index = 0;
$done = true;
for( $index = 0; $index < $chunks; $index++ ) {
    if ( !file_exists("{$filePath}_{$index}.part") ) {
        $done = false;
        break;
    }
}
if ( $done ) {
    
    if (!$out = @fopen($uploadPath, "wb")) {        
        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
    }
    
    if ( flock($out, LOCK_EX) ) {
        for( $index = 0; $index < $chunks; $index++ ) {
            if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                break;
            }

            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }

            @fclose($in);
            @unlink("{$filePath}_{$index}.part");
        }

        flock($out, LOCK_UN);
    }
    @fclose($out);
}

/* read the source image */
$source_image = imagecreatefromjpeg($uploadPath);
$width = imagesx($source_image);
$height = imagesy($source_image);
$desired_width = 70;

/* find the "desired height" of this thumbnail, relative to the desired width  */
$desired_height = floor($height * ($desired_width / $width));

/* create a new, "virtual" image */
$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

/* copy source image at a resized size */
imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

/* create the physical thumbnail image to its destination */
imagejpeg($virtual_image, $uploadPathThumb);
                    

//if($chunks==1) {
// Strip the temp .part suffix off
//rename("{$filePath}_{$index}.part", $filePath);
/*include "functions.php";
        $imgName = $_FILES["file"]["name"];
        $imgSize = $_FILES["file"]["size"];
        $imgType = $_FILES["file"]["type"];
        $imgUrl = $uploadPath;
        saveImgToDB($imgName,$imgSize,$imgUrl, $imgType);
}*/

/*$photoName = $_FILES['file']['name'];
$exploded_photoName = explode('.', $photoName);

if(!isset($_SESSION[$photoName])) {
    mysql_query("INSERT INTO tbl_cus_imgfiles VALUES(NULL, '$UID', '$exploded_photoName[0]', '$fileName', '', now())");    
    $_SESSION[$photoName] = '1';
}*/

  $db = mysql_connect("localhost", "bytabo_se", "EaNWNChK");

  mysql_select_db("bytabo_se",$db);
$imgName = $_FILES["file"]["name"];
        $imgSize = $_FILES["file"]["size"];
        $imgType = $_FILES["file"]["type"];
        $imgUrl = $uploadPath;
$exploded_imgName = explode('.', $imgName);

    mysql_query("INSERT INTO tbl_cus_imgfiles (UID,HID,name,size,URL,type,upload_date) VALUES('$UID','$HID','$imgName','$imgSize','$imgUrl','$exploded_imgName[1]', now())");    
   

// Return Success JSON-RPC response
die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');


