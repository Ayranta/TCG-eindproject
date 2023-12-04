<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }


$kaartID = fetchSingle("SELECT * FROM tblheeftkaart");

foreach($kaartID as $data){
    if($data["userID"] == $_SESSION["login"]){
        
    }
}

?>