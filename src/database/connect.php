
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$servername = 'localhost';
$dbname = 'dbtgcspel';
$username = 'root';
$password = '';

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
  die('Connection failed: ' . $connection->connect_error);
}
?>