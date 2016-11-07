<?php

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "mailout.one.com";
$mail->Port = 25; 
$mail->SMTPAuth = false;
$mail->CharSet = 'UTF-8';
$mail->Username = "";
$mail->Password = "";
$mail->SMTPSecure = "OFF";
$mail->setFrom('admin@bytabo.se', 'bytabo.se');
$mail->addReplyTo('admin@bytabo.se', 'bytabo.se');
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AddEmbeddedImage("assets/img/logoc.png","1");

?>