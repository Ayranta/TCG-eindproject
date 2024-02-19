<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['login'])) {
  header('Location: /account/login');
  exit();
}
if(!isset($_SESSION['admin'])){
  header('Location: /');
  exit();
}
if($_SESSION['admin']===0){
  header('Location: /');
  exit();
}

$packs = fetchSingle("SELECT * FROM `tblpacks`");?>

<h1 class="md:text-center text-4xl font-bold mb-4 ">packs</h1>

<a href = "/user/friendrequest"> <button class="ml-24 p-4  mx-auto shadow-xl rounded-xl">  <i class="fa-solid fa-plus"></i></button></a>


<div class="flex gap-4 text-left" >

<div class="shadow-2xl py-16 w-full mx-16 rounded-3xl  ">



  <div class="ml-2 flex gap-4 flex-wrap justify-between">
    <?php
    foreach ($packs as $data) {
    ?>

      <div class="card card-compact bg-base-100 shadow-xl w-48 mx-4 ">
        <figure><img src="\public\pack-img\<?php echo $data['packImg'] ?>" alt="pack" class="w-auto h-80" /></figure>
        <div class="card-body">
          <h2 class="card-title"><?php echo $data['packNaam'] ?></h2>
        </div>
        <div class="card-actions justify-center pb-2">
          <button class="btn btn-primary">change</button>
        </div>
      </div>

    <?php
    }

    ?>
  </div>
</div>
</div>