<?php
$random = fetch("SELECT kaartID FROM tblkaart");
$random_card_picker = $random[rand(0,count($random)-1)];

$kaart = fetchSingle("SELECT * FROM `tblkaart`WHERE kaartID = ".$random_card_picker['kaartID']);
      echo '<div class="flex gap-4 text-center" >';
      
      ?><div class="flex flex-wrap gap-3 p-20 place-content-center"> <?php
        foreach($kaart as $data){
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $data['categorie']]);
             foreach($categorieen as $categorie){?>

            <h1>enemy</h1>
             <div class="card card-bordered border-gray-600 w-72 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
  <figure ><img src="\public\img\<?php echo $data['foto'] ?>" alt="Shoes" class="w-full h-60"/></figure>
  <p class="text-left p-2 text-black "><?php echo 'hp: ' . $data["levens"] ?></p>
  <div class="card-body text-black text-center ">
    <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
    <p>                <tr>
                    <th><?php echo $data["aanval1"] ?> --</th>
                    <th><?php echo 'damage: '.$data['damage1']?> </th>
                </tr>
                <br>
                <td><?php echo  $data["aanval2"] ?> --</td>
                <td><?php echo'damage: ' . $data["damage2"] ?></td>
             </tr></p>
             <!-- <button class="btn bg-gray">Wijzigen</button><button class="btn bg-gray">Verwijderen</button> -->
             </div>
             </div>


                
          <?php
            }
        }
        
?>
</div>

<form method="post" action="/levels/level-blueprint" class = "flex flex-col gap-4 w-80 md:max-w-2xl p-4 shadow-md rounded-2xl mx-auto mt-16">
<button name="challange" class="btn justify-center p-30">refresh</button>

<?php
/*  
if(isset($_POST['challange'])){

}
*/
?>

</form>



<?php
      $randomgebruiker = fetch("SELECT kaartID FROM tblgebruikerkaart WHERE GebruikerID =" . $_SESSION['login']);
      $random_card_picker_gebruiker = $randomgebruiker[rand(0,count($randomgebruiker)-1)];
      $kaarten = fetchSingle("SELECT * FROM `tblkaart`WHERE kaartID = ".$random_card_picker_gebruiker['kaartID']);

      echo '<div class="flex gap-4 text-center" >';
      ?><div class="flex flex-wrap gap-3 p-20 place-content-center"> <?php
        foreach($kaarten as $data){
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $data['categorie']]);
             foreach($categorieen as $categorie){?>

              <h1>You</h1>
             <div class="card card-bordered border-gray-600 w-72 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
  <figure ><img src="\public\img\<?php echo $data['foto'] ?>" alt="Shoes" class="w-full h-60"/></figure>
  <p class="text-left p-2 text-black "><?php echo 'hp: ' . $data["levens"] ?></p>
  <div class="card-body text-black text-center ">
    <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
    <p>                <tr>
                    <th><?php echo $data["aanval1"] ?> --</th>
                    <th><?php echo 'damage: '.$data['damage1']?> </th>
                </tr>
                <br>
                <td><?php echo  $data["aanval2"] ?> --</td>
                <td><?php echo'damage: ' . $data["damage2"] ?></td>
             </tr></p>
             <!-- <button class="btn bg-gray">Wijzigen</button><button class="btn bg-gray">Verwijderen</button> -->
             </div>
             </div>


                
          <?php
            }
        }
        
?>
</div>