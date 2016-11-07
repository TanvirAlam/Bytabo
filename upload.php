<?php
session_start();

$UID = $_SESSION['UID'];
$HID = $_SESSION['HID'];
//if($_POST['image_form_submit'] == 1){
//if (isset($_POST['submit'])) {           
	$imgFile = $_POST['imgFile'];
        $imgSize = $_POST['imgSize'];
        //$imgFileName = $_POST['imgFileName'];
        
        if(!empty($imgFile)){
            if (!file_exists('imageUpload/'.$UID.'/')) {
                mkdir('imageUpload/'.$UID.'', 0777, true); //Create folder
            }
            
            if (!file_exists('imageUpload/'.$UID.'/'.$HID.'/')) {
                mkdir('imageUpload/'.$UID.'/'.$HID.'', 0777, true);//Create folder
                mkdir('imageUpload/'.$UID.'/'.$HID.'/'.'thumbnail', 0777, true);//Create folder
            }
                $j = 0; //Variable for indexing uploaded image     
                $target_path = "imageUpload/".$UID."/".$HID."/";
                $target_path_thumb = "imageUpload/".$UID."/".$HID."/thumbnail/";
                
                for ($i = 0; $i < count($imgFile); $i++) {
                        $target_file = $target_path.$imgFile;
                        $target_file_thumb = $target_path_thumb.$imgFile;
                        
                        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                        $ext = explode('.', basename($imgFile));//explode file name from dot(.) 
                        $file_extension = end($ext); //store extensions in the variable
                        
                        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
                        $j = $j + 1;//increment the number of uploaded images according to the files in array
                        
                        if(move_uploaded_file($imgFile,$target_path)){
                        
                        }
                }
                //echo "XXX";
                
                $data['success'] = true;
                $data['message'] = $imgSize;
        }else{
                $data['success'] = false;
                $data['message'] = 'Error';
        }
//}

echo json_encode($data);
?>