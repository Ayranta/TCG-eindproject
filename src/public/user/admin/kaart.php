
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

      
      
      $kaart = fetchSingle("SELECT * FROM `tblkaart`");
      echo '<div class="flex gap-4 text-center" >';
      ?><div class="flex flex-wrap gap-3 p-30"> <?php
        foreach($kaart as $data){
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $data['categorie']]);
             foreach($categorieen as $categorie){?>


             <div class="card card-bordered border-gray-600 w-60 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
  <figure ><img src="\public\img\<?php echo $data['foto'] ?>" alt="Shoes" class="w-full "/></figure>
  <p class="text-left p-2 text-black "><?php echo 'hp: ' . $data["levens"] ?></p>
  <div class="card-body text-black text-center md:flex-1 transition relative">
    <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
    <p>                <tr>
                    <th><?php echo $data["aanval1"] ?> --</th>
                    <th><?php echo 'damage: '.$data['damage1']?> </th>
                </tr>
                <br>
                <td><?php echo  $data["aanval2"] ?> --</td>
                <td><?php echo'damage: ' . $data["damage2"] ?></td>
             </tr></p>

             </div>
             </div>

<?php//einde kaart?>
                
          <?php
            }
        }
        
?>
</div>



