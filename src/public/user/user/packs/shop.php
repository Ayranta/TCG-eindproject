
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      
$packs = fetchSingle("SELECT * FROM `tblpacks`");


echo '<div class="flex gap-4 text-center" >'; ?>
<div class="flex flex-wrap gap-8 p-16 place-content-center"> <?php
foreach($packs as $data){
  ?>
<div class="card card-compact w-auto bg-base-100 shadow-xl">
<figure ><img src="\public\pack-img\<?php echo $data['packImg'] ?>" alt="pack" class="w-auto h-80"/></figure>           
  <div class="card-body">
    <h2 class="card-title"><?php echo $data['packNaam'] ?></h2>
  </div>
  <div class="card-actions justify-center pb-2">
      <button class="btn btn-primary">Buy Now</button>
    </div>
</div>
                
          <?php
        }
        
?>
</div>
