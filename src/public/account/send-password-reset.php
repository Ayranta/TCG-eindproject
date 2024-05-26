<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';

$email = $_POST["email"];

//random bytes geeft 16 random bytes en bin2hex zorgt ervoor dat het gelezen kan worden
$token = bin2hex(random_bytes(16));

//geeft een 64 character string
$token_hash = hash("sha256", $token);

//zorgt dat het 30 minuten valid is 60sec * 120
$expiry = date("Y-m-d H:i:s", time() + 60 * 120);

$sql = "UPDATE tblgebruikers
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

    require  "src\public\account\mailer.php";
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END
    
    Click <a href="https://tradingcardgame.virtualmin.cedricverlinden.com/account/reset-password?token=$token">here</a>
    to reset your password.

    END;
 
    if(!$mail->send()){
        echo "Message could not be sent. Mailer error. ". $mail->ErrorInfo;
    }else{
        echo "Message sent, please check your inbox.";
    }

}

