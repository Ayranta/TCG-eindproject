<audio autoplay loop>
  <source src="public\music\Uprising.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<?php


$kaart = $_SESSION['kaartSession'];
echo '<div class="flex gap-4 text-center" >';

?><div class="flex flex-wrap gap-3 p-20 place-content-center p-100"> <?php
  foreach ($kaart as $data) {
    $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?', ['type' => 's', 'value' => $data['categorie']]);
  foreach ($categorieen as $categorie) { ?>

      <h1>enemy</h1>
      <div class="card card-bordered border-red-600 border-2 w-72 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
        <figure><img src="\public\img\<?php echo $data['foto'] ?>" alt="Shoes" class="w-full h-60" /></figure>
        <p class="text-left p-2 text-black "><?php echo 'hp: ' . $data["levens"] ?></p>
        <?php
        $levensenemy = $data["levens"];
        ?>
        <div class="card-body text-black text-center ">
          <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
          <p>
            <tr>
              <th><?php echo $data["aanval1"] ?> --</th>
              <th><?php echo 'damage: ' . $data['damage1'] ?> </th>
            </tr>
            <br>
            <td><?php echo  $data["aanval2"] ?> --</td>
            <td><?php echo 'damage: ' . $data["damage2"] ?></td>
            </tr>
          </p>
        </div>
      </div>



  <?php
     }
  }

  ?>
</div>
<?
//buttons
?>
<form method="post" action="/levels/level-blueprint" class="flex flex-col gap-4 w-80 align-middle md:max-w-2xl p-4 rounded-2xl mx-auto mt-16 pt-6" id="formattack">
  <button name="challange" class="btn justify-center p-30 items-center ">Attack</button>
</form>
<?php

?>
<form method="post" action="/" class="flex flex-col gap-4 w-80 md:max-w-2xl p-4 p-5 align-middle rounded-2xl mx-auto mt-16 pt-6" id="formgoback">
      <button name="back" class="btn justify-center">Go Back</button>
      </form>



<?php



$kaarten = $_SESSION['kaartenSession'];
echo '<div class="flex gap-4 text-center" >';
?><div class="flex flex-wrap gap-3 p-20 place-content-center"> <?php
      foreach ($kaarten as $data) {
        $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?', ['type' => 's', 'value' => $data['categorie']]);
      foreach ($categorieen as $categorie) { ?>

      <h1>You</h1>
      <div class="card card-bordered border-green-600 border-2 w-72 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
        <figure><img src="\public\img\<?php echo $data['foto'] ?>" alt="foto" class="w-full h-60" /></figure>
        <p class="text-left p-2 text-black "><?php echo 'hp: ' . $data["levens"] ?></p>
        <?php
        $levensgebruiker = $data["levens"];
        ?>
        <div class="card-body text-black text-center ">
          <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
          <p>
            <tr>
              <th><?php echo $data["aanval1"] ?> --</th>
              <th><?php echo 'damage: ' . $data['damage1'] ?> </th>
            </tr>
            <br>
            <td><?php echo  $data["aanval2"] ?> --</td>
            <td><?php echo 'damage: ' . $data["damage2"] ?></td>
            </tr>
          </p>
        </div>
      </div>



  <?php
   }
}

  ?>
</div>
<?php
if(isset($_POST["challange"])){

if($levensenemy > $levensgebruiker){
$conc = "YOU LOSE";

}elseif($levensenemy < $levensgebruiker){
$conc = "YOU WIN";
}else{
$conc = "DRAW";
}

}


?>
  <script>
    var conc ='<?= $conc ?>';

    alert(conc);
  </script>

<?