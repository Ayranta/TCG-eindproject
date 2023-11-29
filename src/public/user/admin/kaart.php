
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

      
      
      $kaart = fetchSingle("SELECT * FROM `tblkaart`");
      echo '<div class="flex flex-wrap gap-4">';
      
        foreach($kaart as $data){
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $data['categorie']]);
             foreach($categorieen as $categorie){?>
                <div class="card w-96 shadow-xl bg-[#<?php echo $categorie['kleur hex'] ?>]">
             <?php } ?>
             <p class="text-left p-2 text-black"><?php echo 'hp: ' . $data["levens"] ?></p>
            <figure class="px-10 pt-10">
              <img src="\public\img\<?php echo $data['foto'] ?>" alt="foto" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center text-black">
              <h2 class="card-title"> <?php echo $data["naam"] ?></h2>
              <hl>
                <tr>
                    <th><?php echo $data["aanval1"] ?></th>
                    <th><?php echo $data['aanval2']?> </th>
                </tr>
                <br>
                <td><?php echo 'damage: ' . $data["damage1"] ?></td>
                <td><?php echo 'damage: ' . $data["damage2"] ?></td>
             </tr>
            </div>
          </div>
          <?php
            }

      

?>
</div>

    </div>