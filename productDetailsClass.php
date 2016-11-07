<?php
class DbPD {
    // The database connection
    protected static $connection;

    /**
     * Connect to the database
     */
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('config.ini'); 
            self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }

    /**
     * Query the database
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /*
     * Fetch the last error from the database
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }
    //plain
    public function getProductDetails($HIDCheck, $UIDCheck){
    $qry_Details = $this -> select("SELECT DISTINCT DID, details_name FROM tbl_details ORDER BY details_name"); 
        foreach($qry_Details as $row_Details){    
            $id = $row_Details["DID"];
            $details_name = $row_Details["details_name"];
            
            echo "<li ";
            $qry_Details_Check = $this -> select("SELECT DISTINCT DID FROM tbl_cus_details_have WHERE HID=".$HIDCheck." and UID=".$UIDCheck."");
            foreach($qry_Details_Check as $row_Details_Check){
                $DIDCheck = $row_Details_Check["DID"];
                if($DIDCheck===$id){
                    echo "class='checked'";
                }
            }            
            echo ">$details_name</li>";
        }
    }
}