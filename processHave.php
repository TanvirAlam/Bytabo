<?php     
        
        $errors  = array();  	// array to hold validation errors
        $data    = array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
                                
                $adv_type = $_POST['RegisterType'];
                $address = $_POST['address'];
                $description = $_POST['description'];
                $AID =$_POST['cmbProtertyType'];
                $postno =$_POST['postal_code'];
                $lat =$_POST['lat'];
                $lng =$_POST['lng'];
                $LID =$_POST['cmblandlord'];
                $BID =$_POST['cmbBredband'];
                $rent = filter_var($_POST['HouseRentHave'], FILTER_SANITIZE_NUMBER_INT);                
                $stair = filter_var($_POST['Stair'], FILTER_SANITIZE_NUMBER_INT);
                $bathroom = filter_var($_POST['NoBathRooms'], FILTER_SANITIZE_NUMBER_INT);
                $room = filter_var($_POST['NoRooms'], FILTER_SANITIZE_NUMBER_INT);
                $area = filter_var($_POST['AreaHave'], FILTER_SANITIZE_NUMBER_INT);
                $HaveCheckboxes = $_POST['HaveCheckboxes'];
                $arrlength = count($HaveCheckboxes);    
                
	if (empty($address))
		$errors['address'] = 'Fyll i din adress';

	if (empty($description))
		$errors['description'] = 'Beskriv lite om din bostad';               
//foreach ($HaveCheckboxes as $DID){

	if (empty($AID))
		$errors['cmbProtertyType'] = 'Select Bostadstyp';//$DID;//is_array($HaveCheckboxes) ? 'Array' : 'not an Array';//$cc;//'Select Bostadstyp';                

// return a response ===========================================================
 
	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		// if there are no errors process our form, then return a message
                
                //calling functions
                include "functions.php";
                //calling to sava data                
                save_tbl_cus_apt_have($adv_type ,$address ,$description ,$AID ,$postno ,$lat ,$lng ,$LID ,$BID ,$rent ,$stair ,$bathroom ,$room, $area);
                $UID = $_SESSION['UID'];
                $User_get_HID = DB::queryFirstRow("SELECT HID FROM tbl_cus_apt_have WHERE postno='$postno' AND UID='$UID'");
                $HID = $User_get_HID['HID'];
		$_SESSION['HID'] = $HID;
                $User_Data_Exist = DB::queryFirstRow("SELECT HID FROM tbl_cus_details_have WHERE HID='$HID' AND UID='$UID'");
                $HID_Data_Exist = $User_Data_Exist['HID'];
                for($x = 0; $x < $arrlength; $x++) {                       
                    if(empty($HID_Data_Exist)){
                        DB::insert('tbl_cus_details_have', array(
                                'UID' => $UID,
                                'HID' => $HID,
                                'DID' => $HaveCheckboxes[$x],
                                'Created_date' => $CurrDate)
                       );  //Inserting data into tbl_cus_details_have
                    }
                }
                $CheckImgUpload = DB::queryFirstRow("SELECT UID FROM tbl_cus_imgfiles WHERE UID='$UID'");
                $UID_img = $CheckImgUpload['UID'];
                if(empty($UID_img)){
                        DB::insert('tbl_cus_imgfiles', array(
                                'name' => "no_img.jpg",
                                'UID' => $UID)
                       );  //Inserting no img into tbl_cus_imgfiles
                }
		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);