<?php
if (!isset($_SESSION['login'])) {
    header('Location: /account/login');
    exit();
  }
  if(!isset($_SESSION['admin'])){
    header('Location: /');
    exit();
  }
  if($_SESSION['admin']===0){
    header('Location: /');
    exit();
  }
?>