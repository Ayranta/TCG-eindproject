<?php
$packid = $_GET['packid'];
$pack = fetchSingle("SELECT * FROM `tblpacks` WHERE packId = ?", ['type' => 'i', 'value' => $packid]);
$packcards = fetch("SELECT * FROM `tblpackcards` WHERE packID = ? ORDER BY RAND() LIMIT 3", ['type' => 'i', 'value' => $packid]);
//var_dump($packcards);
//var_dump($pack);


if (isset($_POST['update'])) {
  if (isset($_SESSION['login'])) {
?>
    <div class=" gap-4 text-center">
      <div class="flex flex-wrap gap-3 p-20 place-content-center">
        <?php foreach ($packcards as $cards) :
          $data = fetchSingle('SELECT * FROM `tblkaart` WHERE kaartID = ?', ['type' => 'i', 'value' => $cards['kaartID']]);
          foreach ($data as $data) :
            $categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?', ['type' => 's', 'value' => $data['categorie']]);
            foreach ($categorieen as $categorie) : ?>
              <div class="card card-bordered border-gray-600 w-72 bg-[#<?php echo $categorie['kleur hex'] ?>] shadow-xl">
                <figure><img src="\public\img\<?php echo $data['foto'] ?>" alt="Shoes" class="w-full h-60" /></figure>
                <p class="text-left p-2 text-black ">hp: <?php echo $data["levens"] ?></p>
                <div class="card-body text-black text-center ">
                  <h2 class="font-bold"><?php echo $data["naam"] ?></h2>
                  <p>
                    <tr>
                      <th><?php echo $data["aanval1"] ?> --</th>
                      <th>damage: <?php echo $data['damage1'] ?> </th>
                    </tr>
                    <br>
                    <tr>
                      <td><?php echo $data["aanval2"] ?> --</td>
                      <td>damage: <?php echo $data["damage2"] ?></td>
                    </tr>
                  </p>
                </div>
              </div>

        <?php endforeach;
          endforeach;
        endforeach; ?>
      </div>
    </div>
<?php

    insertcards($packcards , $userid , $pack);
    
    return;
  }


  // header('Location: /');
  exit();
}


function insertcards($formData ,$userid , $pack)
{
  $data = fetchSingle('SELECT * FROM tblgebruikerkaart where gebruikerID = ?' , ['type' => 'i', 'value' => $userid]);


$newcards = array_column($formData, 'kaartID');
$newcards = array_unique($newcards);


  
$amount = 0;
  foreach ($data as $Data) {
    foreach ($newcards as $key => $newcard) {

      if ($Data['KaartID'] === $newcard) {
        unset($newcards[$key]); // remove the existing kaartID from newcards
        $repayment=$pack[0]['price'] / 3;
        $insertcoins = insert('UPDATE tblgebruiker_profile SET coins = coins + ? WHERE userid = ?',
        ['type' => 'i', 'value' => $repayment], ['type' => 'i', 'value' => $userid]);
        $amount++;
        break;
      }
    }
  }
  if ($amount >0){
    $moneyback= $amount * ($pack[0]['price'] / 3);
echo '
<div class="mx-80">
  <div role="alert" class="alert alert-info  ">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span> duplicate(s). you get : '.$moneyback .' coins back</span>
  </div>
</div>';
  }

  foreach ($newcards as $newcard) {
    $query = 'INSERT INTO tblgebruikerkaart(gebruikerID, kaartID) VALUES (?, ?)';

    $insert = insert(
      $query,
      ['type' => 'i', 'value' => $userid],
      ['type' => 'i', 'value' => $newcard],
    );
  }
    if ($insert) {
      ?>
      <div class="flex flex-wrap gap-3 p-20 place-content-center">
        <a href="/member/user/shop">go back to the shop</a>
      </div>
      <?php
      exit();
    }else{
      ?>
      <div class="flex flex-wrap gap-3 mt-2 place-content-center ">
        <a class="underline" href="/member/user/shop">go back to the shop</a>
      </div>
      <?php
    }

    // header('Location: /dashboard/cards/add?error=notAddedCard');
  exit();
  

}


?>

<form action="/member/user/shop/open?packid=<?php echo $packid ?>" method="post">

  <div class="flex md:text-center mt-24 mx-auto justify-center item-center">

    <div class="relative w-96 h-96 overflow-hidden ">

      <div class="absolute inset-0 flex justify-center items-center">
        <button name="update">
          <figure><img src="\public\pack-img\<?php echo $pack[0]['packImg'] ?>" alt="Your Image" class="rounded-lg w-auto h-96 object-cover ">
        </button>
        <figure>
      </div>
    </div>
  </div>
  <p class="md:text-center">(click to open)</p>
</form>