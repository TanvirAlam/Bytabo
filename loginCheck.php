<?php
include "functions.php"; 
$user_email = $_POST['user_email'];
$pWord = $_POST['pWord'];
checkPassword($user_email, $pWord);

?>