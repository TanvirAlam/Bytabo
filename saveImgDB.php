<?php     
session_start();        
        $errors  = array();  	// array to hold validation errors
        $data    = array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
        
        $ImgCat = $_POST['ImgCat'];    
        $imgCount = $_POST['imgCount'];
	$imgName = $_POST['imgName'];
	$arrlengthImgCat = count($imgName);
	
	if ($imgCount != count($ImgCat)){
		$errors['CatMassage'] = 'Ange catagory för varje bild !';
	}
// return a response ===========================================================
 
	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;

	} else {
		//calling functions
                include "functions.php";
                //calling to sava data
		$UID = $_SESSION['UID'];
		$HID = $_SESSION['HID'];
		for($x = 0; $x < $arrlengthImgCat; $x++) {
			DB::insert('tbl_cus_imgfiles', array(			    
			    'UID' => $UID,
			    'HID' => $HID,
			    'name' => $imgName[$x],
			    'size' => '',
			    'type' => '',
			    'catg' => $ImgCat[$x],
			    'upload_date' => $CurrDate
			)
		   );  //Inserting data into tbl_cus_imgfiles
		}

		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);