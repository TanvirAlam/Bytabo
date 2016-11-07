<?php
require_once "DBClass.php";
//Get the information based on USER SESSION LOGED IN
class MyAccDataClass extends DBClass{
    // The session id
    protected $_UID;
    
    public function __construct(){
        $this->_UID = $_SESSION['UID'];
    }
    
    public function getMyAccDataDB(){        
        $myAccData = DB::query("SELECT DISTINCT HID, adv_type, address, postno, description, LID, BID, AID, rent, stair, bathroom, room, area
                              FROM tbl_cus_apt_have WHERE UID='$this->_UID'");
        return $myAccData;
    }
    
    public function getMyAccData(){
        foreach($this->getMyAccDataDB as $row_data) {
            $HID = $row_data["HID"];                   
            $adv_type = $row_data["adv_type"];
            $address = $row_data["address"];
            $postno = $row_data["postno"];
            $description = $row_data["description"];
            $LID = $row_data["LID"];
            $BID = $row_data["BID"];
            $AID = $row_data["AID"];
            $rent = $row_data["rent"];
            $stair = $row_data["stair"];
            $bathroom = $row_data["bathroom"];
            $room = $row_data["room"];
            $area = $row_data["area"];
            
            return $address;
        }
    }
}