<?php     
        
        $errors  = array();  	// array to hold validation errors
        $data    = array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
                                
                $adv_type = $_POST['RegisterType'];
                $WantAddress = $_POST['WantAddress'];
		$arrlengthAddress = count($WantAddress);
		
		$Wantcmblandlord =$_POST['Wantcmblandlord'];
		$arrlengthLandlord = count($Wantcmblandlord);
		
                $description = $_POST['description'];
                $AID =$_POST['cmbProtertyType'];
                $rent = filter_var($_POST['RentRange'], FILTER_SANITIZE_NUMBER_INT);
		$rentArray = explode("-", $rent);
		$min_rent = $rentArray[0];
		$max_rent = $rentArray[1];
		
                $stair = filter_var($_POST['StairRange'], FILTER_SANITIZE_NUMBER_INT);
		$stairArray = explode("-", $stair);
		$min_stair = $stairArray[0];
		$max_stair = $stairArray[1];
		
                $bathroom = filter_var($_POST['NoBathRoomsRange'], FILTER_SANITIZE_NUMBER_INT);
		$bathroomArray = explode("-", $bathroom);
		$min_bathroom = $bathroomArray[0];
		$max_bathroom = $bathroomArray[1];
		
                $room = filter_var($_POST['NoRoomsRange'], FILTER_SANITIZE_NUMBER_INT);
		$roomArray = explode("-", $room);
		$min_room = $roomArray[0];
		$max_room = $roomArray[1];
		
                $area = filter_var($_POST['AreaRange'], FILTER_SANITIZE_NUMBER_INT);
		$areaArray = explode("-", $area);
		$min_area = $areaArray[0];
		$max_area = $areaArray[1];
		
                $WantCheckboxes = $_POST['WantCheckboxes'];
                $arrlength = count($WantCheckboxes);    
                
	if (empty($WantAddress))
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
                save_tbl_cus_apt_want($adv_type, $description ,$AID ,$min_rent ,$max_rent ,$min_stair ,$max_stair, $min_bathroom, $max_bathroom, $min_room, $max_room, $min_area, $max_area);
                $UID = $_SESSION['UID'];
                $User_get_WID = DB::queryFirstRow("SELECT WID FROM tbl_cus_apt_want WHERE AID='$AID' AND UID='$UID' AND adv_type='$adv_type'");
                $WID = $User_get_WID['WID'];
		$User_Data_Exist = DB::queryFirstRow("SELECT WID FROM tbl_cus_details_want WHERE WID='$WID' AND UID='$UID'");
                $WID_Data_Exist = $User_Data_Exist['WID'];
                for($x = 0; $x < $arrlength; $x++) {
			if(empty($WID_Data_Exist)){
				DB::insert('tbl_cus_details_want', array(
					'UID' => $UID,
					'WID' => $WID,
					'DID' => $WantCheckboxes[$x],
					'Created_date' => $CurrDate)
			       );  //Inserting data into tbl_cus_details_want
			}                    
                }
		for($y = 0; $y < $arrlengthAddress; $y++) {
			if(empty($WID_Data_Exist)){
				DB::insert('tbl_cus_loc_want', array(
					'UID' => $UID,
					'WID' => $WID,
					'region_code' => $WantAddress[$y],
					'Created_date' => $CurrDate)
			       );  //Inserting data into tbl_cus_loc_want
			}                    
                }
                for($z = 0; $z < $arrlengthLandlord; $z++) {
			if(empty($WID_Data_Exist)){
				DB::insert('tbl_cus_landlord_want', array(
					'UID' => $UID,
					'WID' => $WID,
					'LID' => $Wantcmblandlord[$z],
					'Created_date' => $CurrDate)
			       );  //Inserting data into tbl_cus_landlord_want
			}                    
                }    
                
		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);