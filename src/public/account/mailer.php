<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('casper.nauwelaerts@gmail.com');
$mail->Username = "casper.nauwelaerts@gmail.com";
$mail->Password = "vrpjciewshdtsdbi";

$mail->isHTML(true);

return $mail;