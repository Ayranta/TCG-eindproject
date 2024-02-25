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

<a href = "/admin/user/packs/add"> <button class="ml-24 p-4  mx-auto shadow-xl rounded-xl">  <i class="fa-solid fa-plus"></i></button></a>


<div class="flex gap-4 text-left" >

<div class="shadow-2xl py-16 w-full mx-16 rounded-3xl  ">



  <div class="ml-2 flex gap-2 flex-wrap justify-between">
    <?php
    foreach ($packs as $data) {
    ?>

      <div class="card card-compact bg-base-100 shadow-xl w-48 mx-4 ">
        <figure><img src="\public\pack-img\<?php echo $data['packImg'] ?>" alt="pack" class="w-auto h-80" /></figure>
        <div class="card-body">
          <h2 class="card-title"><?php echo $data['packNaam'] ?></h2>
        </div>
        <div class="card-actions justify-center pb-2">
          <a href="/admin/user/packs/change?packID=<?php echo $data['packId'] ?>"><button class="btn btn-primary">change</button></a>
        </div>
        <div class="card-actions justify-center pb-2">
          <a href="/admin/user/packs/delete?packid=<?php echo $data['packId'] ?>"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></a>
        </div>
      </div>

    <?php
    }

    ?>
  </div>
</div>
</div>