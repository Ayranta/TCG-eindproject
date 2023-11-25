<?php

function isEmailCorrect($connection,$email){
    $resultaat = $connection->query("SELECT * FROM tblgebruikers where email = '".$email."'");
    return ($resultaat->num_rows == 0) ? false : true;
}
function isPasswordCorrect($connection,$password,$email){
    $resultaat = $connection->query("SELECT * FROM tblgebruikers where email = '".$email."'");
    return (password_verify($password,$resultaat->fetch_assoc()['wachtwoord']))?true:false;
}
function registerUser($connection, $fname, $lname, $email, $password, $profile_picture, $desc) {
    if(empty($profile_picture)) {
        $profile_picture = "profile.png";
        
    }
    $password = convertPasswordToHash($password);
}
    function registreerkaart($connection, $naam, $categorie, $levens, $aanval1, $aanval2, $damage1, $damage2, $file_name) {
        if(empty($profile_picture)) {
            $profile_picture = "profile.png";
        }
    $resultaat = $connection->query("INSERT INTO tblgebruikers (email, voornaam, naam, wachtwoord, profielfoto, beschrijving) VALUES ('".$email."','".$fname."','".$lname."','".$password."','".$profile_picture."','".$desc."')");
    return $resultaat;
}
function convertPasswordToHash($password) {
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedpassword;
}
function getGebruikersid($connection,$email){
    $resultaat = $connection->query("SELECT * FROM tblgebruikers where email = '".$email."'");
    return ($resultaat->num_rows == 0)?false:$resultaat->fetch_assoc()['gebruikerid'];
}
function checkIfAdmin($connection,$email){
    $resultaat = $connection->query("SELECT * FROM tblgebruikers,tblgebruiker_profile where email = '".$email."' and admin=1");
    return ($resultaat->num_rows == 0)?false:$resultaat->fetch_all(MYSQLI_ASSOC);
}
function cache_createKey($connection, $keyName, $keyValue) {
    return ($connection->query("INSERT INTO tblcache(cachenaam, cachewaarde) VALUES('".$keyName."', '".password_hash($keyValue, PASSWORD_DEFAULT)."')"));
}

?>
