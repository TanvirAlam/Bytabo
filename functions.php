<?php
session_start();
/* 2 hours in seconds
$inactive = 300; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours
session_start();
if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
$_SESSION['testing'] = time();
*/

include "dbconnect.php"; //Connect to DB
require("PHPMailer/PHPMailerAutoload.php"); //PHPMailer
$CurrDate = date("Y-m-d H:i:s"); //Current Timestamp

function getLocation(){	
	//Query for fetching city info from tbl_country
    $qry_city = DB::query("SELECT DISTINCT city_code, city_name FROM tbl_country ORDER BY city_name"); 
    foreach($qry_city as $row_city) {
        $LOC_city_code = $row_city["city_code"];
        $LOC_city_name = $row_city["city_name"];           
    	echo "<optgroup label='$LOC_city_name'>";
    	//Query for fetching rigion info from tbl_country
        $qry_rigion = DB::query("SELECT DISTINCT rigion_code, rigion_name FROM tbl_country WHERE city_code = '$LOC_city_code' ORDER BY rigion_name"); 
        foreach($qry_rigion as $row_rigion) {
            $LOC_rigion_code = $row_rigion["rigion_code"];
            $LOC_rigion_name = $row_rigion["rigion_name"];                
          	echo "<option value='$LOC_rigion_code'>$LOC_rigion_name</option>";                
         }                
    	echo "</optgroup>";            
      }           
}
function getHouseType(){
    $qry_HouseType = DB::query("SELECT DISTINCT PID, property_name FROM tbl_property ORDER BY property_name"); 
    foreach($qry_HouseType as $row_HouseType){    
        $id = $row_HouseType["PID"];
        $property_name = $row_HouseType["property_name"];
	echo "<option value='$id'>$property_name</option>";
    }
}
function getBroadBandCompany(){
    $qry_Broadband = DB::query("SELECT DISTINCT BID, broadband_name FROM tbl_broadband ORDER BY broadband_name"); 
    foreach($qry_Broadband as $row_Broadband){    
        $id = $row_Broadband["BID"];
        $broadband_name = $row_Broadband["broadband_name"];
	echo "<option value='$id'>$broadband_name</option>";
    }
}
function getLandlord(){
    $qry_landlord = DB::query("SELECT DISTINCT LID, landlord_name FROM tbl_landlord ORDER BY landlord_name"); 
    foreach($qry_landlord as $row_landlord){    
        $id = $row_landlord["LID"];
        $landlord_name = $row_landlord["landlord_name"];
	echo "<option value='$id'>$landlord_name</option>";
    }
}
function getDetails(){
    $qry_Details = DB::query("SELECT DISTINCT DID, details_name FROM tbl_details ORDER BY details_name"); 
    foreach($qry_Details as $row_Details){    
        $id = $row_Details["DID"];
        $details_name = $row_Details["details_name"];
	echo "<li id='amenities-$id' class='popular-category'>
	  <label class='selectit'>
	    <input value='$id' type='checkbox' name='amenities[]' id='in-amenities-$id'/> $details_name
	  </label>
	</li>";
    }
}
function saveFeedback($message){	 
    DB::insert('tbl_feedback', array('feedback' => $message,'feedbackDate' => $CurrDate));  //Inserting data into tbl_feedback
}

function registerUser($user_name, $Cpwd){
    global $RegStatus;
    $SeedPassword=$Cpwd;
    $HashPassword=encryptIt($SeedPassword);
    $ActivationCode = genActivationCode();
    $User_Exist = DB::queryFirstRow("SELECT User_Name, Confirm FROM tbl_users WHERE User_Name='$user_name'");
    $User_Name_Exist=$User_Exist['User_Name'];
    $Confirm=$User_Exist['Confirm'];
    if(empty($User_Name_Exist)){
	DB::insert('tbl_users', array('User_Name' => $user_name,'Password' => $HashPassword, 'Act_Code' =>$ActivationCode, 'Created_date' => $CurrDate));  //Inserting data into tbl_users
	registerUserSendEmailConfirmation($user_name);
	$RegStatus = 1;
    }elseif($Confirm == "" && !empty($User_Name_Exist)){
	$RegStatus = 1;
    }else{
	$RegStatus = 0;
    }
}
function sendActivationCodeAgain($user_name){
    include "mailconfig.php";
    $ActivationCode = genActivationCode();
    DB::update('tbl_users', array(
      'Act_Code' => $ActivationCode
    ), "User_Name=%s", $user_name);
    $mail->addAddress($user_name, "bytabo.se");
    $mail->Subject = 'Vänligen bekräfta din e-postadress!';
    $mail->Body    = "<div style='position:absolute; left:15px; top:19px; width:607px; height:251px; z-index:1;'>";
    $mail->Body   .= "<h1>Välkommen till Bytabo.se</h1>";
    $mail->Body   .= "<p>Tack för registering och vi kloka du en bästa lämpliga bostäder lösning.</p>";
    $mail->Body   .= "<p>Vänligen klicka kopian och förbi Aktiveringskod:</p>";
    $mail->Body   .= "<h2>".$ActivationCode."</h2><br /><br />";
    $mail->Body   .= "<p>Bytabo.se</p>";
    $mail->Body   .= "</div>";                                       
  
    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
function registerUserSendEmailConfirmation($user_name){
  include "mailconfig.php";
  $User_Act_Code = DB::queryFirstRow("SELECT Act_Code FROM tbl_users WHERE User_Name='$user_name'");
  $Act_Code = $User_Act_Code['Act_Code'];
  $mail->addAddress($user_name, "bytabo.se");
  $mail->Subject = 'Vänligen bekräfta din e-postadress!';
  $mail->Body    = "<div style='position:absolute; left:15px; top:19px; width:607px; height:251px; z-index:1;'>";
  $mail->Body   .= "<h1>Välkommen till Bytabo.se</h1>";
  $mail->Body   .= "<p>Tack för registering och vi kloka du en bästa lämpliga bostäder lösning.</p>";
  $mail->Body   .= "<p>Vänligen klicka kopian och förbi Aktiveringskod:</p>";
  $mail->Body   .= "<h2>".$Act_Code."</h2><br /><br />";
  $mail->Body   .= "<p>Bytabo.se</p>";
  $mail->Body   .= "</div>";                                       

  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
}

function sendPassword($user_name){
  include "mailconfig.php";
  
  $User_Pass = DB::queryFirstRow("SELECT Password, Confirm FROM tbl_users WHERE User_Name='$user_name'");
  $Confirm = $User_Pass['Confirm'];
  if(!empty($Confirm)){
    $Password=decryptIt($User_Pass['Password']);
    $mail->addAddress($user_name, "bytabo.se");
    $mail->Subject = 'Vänligen bekräfta din e-postadress!';
    $mail->Body    = "XXX";                                       
    $mail->Body   .= $Password;
  
    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
    echo "Password Sent";
  }else{
    echo "Password NOT Sent";
  }
  
}

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function genActivationCode() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function accActivate($act_code, $user_name){
    $User_Act_Code = DB::queryFirstRow("SELECT Act_Code FROM tbl_users WHERE User_Name='$user_name'");
    $get_Act_Code = $User_Act_Code['Act_Code'];
    if($get_Act_Code === $act_code){
	DB::update('tbl_users', array(
	    'Confirm' => 'YES'
	  ), "User_Name=%s", $user_name);
	echo "Account Activated";
    }    
}

function checkPassword($user_email, $pWord){
    $User_Password = DB::queryFirstRow("SELECT UID, Password FROM tbl_users WHERE User_Name='$user_email' AND Confirm='YES'");
    $pWord_Org = decryptIt($User_Password['Password']);
    $login_UID = $User_Password['UID'];
    if($pWord===$pWord_Org){
	echo 'true';
	$_SESSION['login_user'] = $user_email;
	$_SESSION['UID'] = $login_UID;
    }else{
	echo 'false';
    }
}
function save_tbl_cus_apt_have($adv_type ,$address ,$description ,$AID ,$postno ,$lat ,$lng ,$LID ,$BID ,$rent ,$stair ,$bathroom ,$room, $area, $HaveCheckboxes){
	$UID = $_SESSION['UID'];
	$User_Data_Exist = DB::queryFirstRow("SELECT UID FROM tbl_cus_apt_have WHERE postno='$postno' AND UID='$UID'");
	$UID_Data_Exist = $User_Data_Exist['UID'];   
	if(empty($UID_Data_Exist)){
		    DB::insert('tbl_cus_apt_have', array(
			    'UID' => $UID,
			    'adv_type' => $adv_type,
			    'address' =>$address,
			    'postno' => $postno,
			    'description' => $description,
			    'LID' => $LID,
			    'BID' => $BID,
			    'AID' => $AID,
			    'rent' => $rent,
			    'stair' => $stair,
			    'bathroom' => $bathroom,
			    'room' => $room,
			    'area' => $area,
			    'lat' => $lat,
			    'lng' => $lng,
			    'C_date' => $CurrDate
			)
		   );  //Inserting data into tbl_cus_apt_have
		    
	}
	$_SESSION['postno'] = $postno;
}
function getAdv_type($UID, $postno){
    $User_Adv_type = DB::queryFirstRow("SELECT adv_type FROM tbl_cus_apt_have WHERE postno='$postno' AND UID='$UID'");
    $adv_type = $User_Adv_type['adv_type'];
    return $adv_type;
}
function save_tbl_cus_apt_want($adv_type, $description ,$AID ,$min_rent ,$max_rent ,$min_stair ,$max_stair, $min_bathroom, $max_bathroom, $min_room, $max_room, $min_area, $max_area){
	$UID = $_SESSION['UID'];
	$postno = $_SESSION['postno'];	
	$User_get_HID = DB::queryFirstRow("SELECT HID FROM tbl_cus_apt_have WHERE postno='$postno' AND UID='$UID' AND adv_type='$adv_type'");
        $HID = $User_get_HID['HID'];	
	$User_Data_Exist = DB::queryFirstRow("SELECT UID FROM tbl_cus_apt_want WHERE AID='$AID' AND UID='$UID' AND adv_type='$adv_type'");
	$UID_Data_Exist = $User_Data_Exist['UID'];   
	if(empty($UID_Data_Exist)){
		    DB::insert('tbl_cus_apt_want', array(
			    'HID' => $HID,
			    'UID' => $UID,
			    'adv_type' => $adv_type,
			    'description' => $description,
			    'AID' => $AID,
			    'min_rent' => $min_rent,
			    'max_rent' => $max_rent,
			    'min_stair' => $min_stair,
			    'max_stair' => $max_stair,
			    'min_bathroom' => $min_bathroom,
			    'max_bathroom' => $max_bathroom,
			    'min_room' => $min_room,
			    'max_room' => $max_room,
			    'min_area' => $min_area,
			    'max_area' => $max_area,
			    'C_date' => $CurrDate
			)
		   );  //Inserting data into tbl_cus_apt_want
	}
}

function getMyAccData(){
    $UID = $_SESSION['UID'];
    $myAccData = DB::query("SELECT DISTINCT HID, adv_type, address, postno, description, LID, BID, AID, rent, stair, bathroom, room, area
			  FROM tbl_cus_apt_have WHERE UID='$UID'");
    return $myAccData;
}
function getGPSCoor(){
     $GRPCoord = DB::query("SELECT DISTINCT lat, lng FROM tbl_cus_apt_have");
     return $GRPCoord;     
}
function getCusImage(){
    $UID = $_SESSION['UID'];
    $qry_getImage = DB::query("SELECT DISTINCT name FROM tbl_cus_imgfiles WHERE UID='$UID'"); 
    foreach($qry_getImage as $row_CusImage){    
        $name = $row_CusImage["name"];
	
	echo "<div class='images'>
	<img src='server/php/files/1/thumbnail/$name' alt='' />
	</div>";
	echo "<div class='images'>
	DELETE
	</div>";
	
    }
}

function saveImgToDB($imgName, $imgSize, $imgUrl, $imgType){
    $UID = $_SESSION['UID'];
    $HID = $_SESSION['HID'];
    /*$UserImgExist = DB::queryFirstRow("SELECT name FROM tbl_cus_imgfiles
				      WHERE UID='$UID' AND
				      HID='$HID' AND
				      name='$imgName' AND
				      size='$imgSize'");*/
   // $UserImgExist = $UserImgExist['name'];
    //echo $User_Img_Exist;
//	if(empty($User_Img_Exist)){    
	    DB::insert('tbl_cus_imgfiles', array(			    
		'UID' => $UID,
		'HID' => $HID,
		'name' => $imgName,
		'size' => $imgSize,
		'URL' => $imgUrl,
		'type' => $imgType,
		'upload_date' => $CurrDate)
	    );  //Inserting data into tbl_cus_imgfiles
	//}
}
?>