<?php
if (!isset($_SESSION['login'])) {
  header('Location: /account/login');
  exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/catalog/users.php';

$users = users($userid);
echo'
<div class="min-h-[80svh] w-full flex flex-col  px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2">
    <ul>
      <li><a href="/">Home</a></li>
      <li>admin</li>
      <li><a href="/account/register"></a>gebruikers</li>
    </ul>
  </div>
';

if (!$users) {
  echo '
  <div class="flex flex-col items-center justify-center gap-4">
    <h1 class="text-4xl font-bold">You have no products</h1>
    <a href="/dashboard/products/add" class="btn btn-primary">Add Product</a>
  </div>
  ';
  exit();
}

echo '
<div class="flex flex-col gap-8">
';

foreach ($users as $user) {
    if($user['admin'] === 1){
        $admin = 'true';
    }else{
        $admin = 'false';
    }
  echo '
  <div class="card card-side bg-base-100 shadow mx-2   ">
    <figure class="rounded-full w-28 h-28 my-auto">
      <img src="'.$user['profielfoto'].'" alt="Movie"/>
    </figure>
    <div class="card-body">
      <h2 class="card-title">' . $user['gebruikernaam'] . '</h2>
      <p>' . $user['email'] . '</p>
      <div class="card-actions justify-between items-center">
        <p class="text-xl text-left font-bold">admin : ' . $admin . '</p>
        <div class="flex flex-row gap-2">
          <a href="/admin/users/edit?gebruikerid='.$user['gebruikerid'].'" class="btn btn-primary">wijzigen</a>
          <a href="\src\public\user\admin\delete_user.php?gebruikerid='.$user['gebruikerid'].'"><button class="btn btn-circle btn-outline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
         </button></a>
        </div>
      </div>
    </div>
  </div>
  ';
}

echo '
</div>
';