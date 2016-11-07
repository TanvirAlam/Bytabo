<?php
include "functions.php";
$message = $_POST['feedback'];
saveFeedback($message);
echo "Message Sent";
?>