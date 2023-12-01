<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/catalog/users.php';


if(isset($_GET['gebruikerid'])){
$gebruikerid = $_GET['gebruikerid'];


$delete_user1=insert('DELETE FROM tblgebruikers WHERE `gebruikerid` = ? ',['type' => 'i', 'value' => $gebruikerid]);
$delete_user2=insert('DELETE FROM tblgebruiker_profile WHERE `userid`= ?',['type' => 'i', 'value' => $gebruikerid]);


    if($delete_user1&&$delete_user2){
        header('Location: /dashboard/users?success=deleteProduct');
    }else{
        header('Location: /dashboard/users?error=deleteProduct');
    }


}else{
   
    header('Location: /dashboard/users');
}
?>