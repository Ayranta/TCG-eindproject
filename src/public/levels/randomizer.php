<?php


$random = fetch("SELECT kaartID FROM tblkaart");
$random_card_picker = $random[rand(0, count($random) - 1)];

$kaart = fetchSingle("SELECT * FROM `tblkaart`WHERE kaartID = " . $random_card_picker['kaartID']);
echo '<div class="flex gap-4 text-center" >';

$_SESSION['kaartSession'] = $kaart;



$randomgebruiker = fetch("SELECT kaartID FROM tblgebruikerkaart WHERE GebruikerID =" . $_SESSION['login']);
$random_card_picker_gebruiker = $randomgebruiker[rand(0, count($randomgebruiker) - 1)];
$kaarten = fetchSingle("SELECT * FROM `tblkaart`WHERE kaartID = " . $random_card_picker_gebruiker['kaartID']);

$_SESSION['kaartenSession'] = $kaarten;

var_dump($_SESSION['kaartenSession']);

header('location: /levels/level-blueprint');
exit();
?>
