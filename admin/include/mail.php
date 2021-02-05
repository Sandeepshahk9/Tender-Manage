<?php

include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail


//$mail->Host = "smtp.gmail.com";
$mail->Host ="inr04.solidhosting.pro";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "admin@tendertm.com"; //enter your gmail username
$mail->Password = "GM2w6m+}y=3s";               //enter your gmail password
$mail->FromName = 'Tendertm.com';
// $mail->AddReplyTo('contact@tendertm.com.', 'Tendertm.com');





?>