
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      if (!isset($_SESSION['login'])) {
        header('Location: /');
        exit();
      }
      
$packs = fetchSingle("SELECT * FROM `tblpacks`");
$usercoins=fetchSingle("SELECT * FROM `tblgebruiker_profile` WHERE userid = ?",['type' => 'i', 'value' => $userid]);

?>
<h1 class="md:text-center text-4xl font-bold mb-4 ">shop</h1>

  <h2 class = "md:text-end font-semibold  mr-24"><i class="fa-brands fa-viacoin fa-lg"></i> <?php echo $usercoins[0]['coins'] ?></h2>

<div class="flex gap-4 text-center" >

<div class="flex flex-wrap gap-12  p-16 items-center justify-center"> <?php
foreach($packs as $data){
  ?>
<div class="card card-compact w-auto bg-base-100 shadow-xl basis-[320px]">
<figure ><img src="\public\pack-img\<?php echo $data['packImg'] ?>" alt="pack" class="w-auto h-72"/></figure>           
  <div class="card-body">
    <h2 class="card-title"><?php echo $data['packNaam'] ?></h2>
    <p class="md:text-end font-bold"><i class="fa-brands fa-viacoin fa-lg"></i> <?php echo $data['price'] ?></p>
  </div>
  <div class="card-actions justify-center pb-2">
      <a href="/member/user/shop/buy?packid=<?php echo $data['packId'] ?>"><button class="btn btn-primary">Buy Now</button></a>
    </div>
</div>
                
          <?php
        }
        
?>
</div>
