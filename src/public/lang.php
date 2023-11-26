<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    require change_Language();
    function change_Language(){
        $_SESSION['taal'] = $_SESSION['taal'] ?? 'en';
        $_SESSION['taal'] = $_GET['taal'] ?? $_SESSION['taal'];
    }

    function Vertalen($str){

        global $taal;
        if(!empty($taal[$str]))
        {
            return $taal[$str];
        }
        return $str;

    }

?>