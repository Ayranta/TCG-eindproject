<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

if (isset($_SESSION["login"])) {
  handleTheme($_SESSION);
  return;
}

header('Location: /');
exit();

function handleTheme($data) {
  $user = $data['login'];

  $change_theme = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $_SESSION["login"]]);
  
  $theme = $change_theme['theme'] === 'dark' ? 'light' : 'dark';
 
  $change_theme = insert(
    'UPDATE tblgebruiker_profile SET theme = ? WHERE userid = ?',
    ['type' => 's', 'value' => $theme],
    ['type' => 'i', 'value' => $user],
  );
  var_dump($change_theme);
  $_SESSION['user']['theme'] = $theme;
  
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}?>
