<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      $gebruiker = fetch("SELECT * FROM tblgebruikers");
      $kaart = fetch("SELECT kaartID FROM tblkaart");
      $gebruikerkaart = fetch("SELECT * FROM tblgebruikerkaart");
    
      //var_dump($_SESSION["login"]);
      //var_dump($gebruikerkaart);
     /*echo '<pre>';
      var_dump($kaart);
      echo '</pre>';*/
      fetchSingle("SELECT * FROM `tblkaart`, tblgebruikerkaart  WHERE kaartID = kaartid AND GebruikerID = " . $_SESSION['login']);
      echo '<div class="flex gap-4 text-center" >';
      ?><div class="flex flex-wrap gap-3 p-20 place-content-center"> <?php
        foreach($kaarten as $data){
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $data['categorie']]);
             foreach($categorieen as $categorie){?>


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