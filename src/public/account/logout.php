<?php
if (!isset($_SESSION['login'])) {
  header('Location: /account/login');
  return;
}

session_destroy();
header('Location: /');