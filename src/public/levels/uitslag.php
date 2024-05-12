<?php
$levensgebruiker = $_SESSION['levensgebruiker'];
$levensenemy = $_SESSION['levensenemy'];





if($levensenemy > $levensgebruiker){
$conc = "YOU LOSE";
$experience = 0;
$coins = 0;

}elseif($levensenemy < $levensgebruiker){
$conc = "YOU WIN";
$experience = 50;
$coins = 5;

}else{
$conc = "DRAW";
$experience = 25;
$coins = 2;

}


$EExperience = fetch("SELECT Expirience FROM tblgebruiker_profile WHERE userid = $userid");
//var_dump("experience voor " .$EExperience);
$Experience = $EExperience['Expirience'] + $experience;
//var_dump("experience na". $Experience);


$sql = "UPDATE tblgebruiker_profile SET Expirience = $Experience WHERE userid = $userid";

$stmt = $mysqli->prepare($sql);

$stmt->execute();
$stmt->close();

$Money = fetch("SELECT coins FROM tblgebruiker_profile WHERE userid = $userid");
//var_dump("experience voor " .$EExperience);
$money = $Money['coins'] + $coins;
//var_dump("experience na". $Experience);


$sql = "UPDATE tblgebruiker_profile SET coins = $money WHERE userid = $userid";

$stmt = $mysqli->prepare($sql);

$stmt->execute();
$stmt->close();
/*var_dump($EExperience);
var_dump($sql);*/
//print $conc;


$hoogsteLevel = fetch("SELECT MAX(LevelID) FROM `playerlevels` WHERE ExpirienceRequired <= $Experience");
//var_dump($hoogsteLevel);
$hoogsteLevelImplode = (int)implode("",$hoogsteLevel);
//var_dump($hoogsteLevelImplode);
$sql2 = "UPDATE tblgebruiker_profile SET Levels = $hoogsteLevelImplode WHERE userid = $userid";

$stmt = $mysqli->prepare($sql2);

$stmt->execute();
$stmt->close();


?>

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center justify-center">
    <div class="flex justify-end px-4 pt-4">
    </div>
    <br>
    <div class="flex flex-col items-center pb-10">
                <p class="text-white text-3xl p-10"><?=$conc?></p>
        <br>
        
        <p class="text-white inline-block">gained experience: <div class="text-green-300 inline-block"><font size="5"><b><?=$experience?></b></font></div>
        <p class="text-white inline-block">gained coins: <div class="text-amber-400 inline-block"><font size="5"><b><?=$coins?></b></font></div>
        <form method="post" action="/" class="flex flex-col gap-4 w-80 md:max-w-2xl p-4 p-5 align-middle rounded-2xl mx-auto mt-16 pt-6" id="formgoback">
      <button name="back" class="btn justify-center">Go Back</button>
      </form>
</div>




