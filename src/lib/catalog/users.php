<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php'; 

function users($userid) {
    $query = 'SELECT * FROM tblgebruikers,tblgebruiker_profile WHERE tblgebruikers.gebruikerid = tblgebruiker_profile.userid ';
    $users = fetch($query);
  
    if (empty($users)) {
      return false;
    }
  
    if (isset($users['gebruikerid'])) {
      $users = [$users];
    }
  
    foreach ($users as &$user) {
      if (strlen($user['gebruikernaam']) > 20) {
        $user['gebruikernaam'] = substr_replace($user['gebruikernaam'], '...', 21);
      }
  
      if (strlen($user['email']) > 40) {
        $user['email'] = substr_replace($user['description'], '...', 41);
      }
    }
  
    return $users;
  }