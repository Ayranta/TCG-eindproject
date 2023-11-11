<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/catalog/users.php';

echo "<h1>Record verwijderen</h1>";

$sql=fetch('DELETE FROM artikel WHERE artikelnummer =?');

$mysqli->close();
var_dump($sql);


?>