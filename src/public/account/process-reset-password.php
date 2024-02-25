<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);



require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';

$sql = "SELECT * FROM tblgebruikers WHERE reset_token_hash = ?";

//stmt = statement
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user === null) {
    die("token not found");
}

if(strtotime($user["reset_token_expires_at"]) <= time()){
    die("token has expired");
}

if (strlen($_POST["password"]) < 3) {
    die("Password must be at least 3 characters");
}

if (strlen($_POST["password"]) > 20) {
    die("Password must be less than 20 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE tblgebruikers SET wachtwoord = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE gebruikerid = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["gebruikerid"]);

$stmt->execute();

echo "Password Updated. You can now login.";





