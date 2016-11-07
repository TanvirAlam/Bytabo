<?php
include "functions.php";
$act_code = $_POST['act_code'];
$user_name = $_POST['user_name'];
accActivate($act_code, $user_name);

?>