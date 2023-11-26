<?php
if (!isset($_SESSION['login'])) {
  header('Location: /');
  exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userId = $_SESSION['login'];




if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        insertCategory($_POST);
        return;
    }
      

     header('Location: /');
     exit();
       
}

function insertCategory($formData) {
    $data = fetchSingle('SELECT * FROM kaart_categorieen');
    
   
    $newcolor=$formData['kleur'];
    $newname=$formData['naam'];

    foreach($data as $Data){
    
      if($Data['naam']===$newname){
        header('Location: /dashboard/categorieen/add?error=categoryAlreadyExists'); 
        exit;
      }
    }

    $newcolor = ltrim($newcolor, '#');

    $correcthex = preg_match('/^[#a-fA-F0-9]{6}$/', $newcolor);

    if(!$correcthex){
       header('Location: /dashboard/categorieen/add?error=notACorrectHex');
       exit;
    }
  
    $query ='INSERT INTO kaart_categorieen(naam,`kleur hex`) VALUES (?,?)';

   $insert = insert(
      $query,
      ['type' => 's', 'value' => $newname],
      ['type' => 's', 'value' => $newcolor],
    );
    
    
    
    if ($insert) {
      
        header('Location: /dashboard/categorieen ');
      exit();
    }
    
    header('Location: /dashboard/categorieen/add?error=notAddedCategory');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center  py-8 ">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>cattegorieen</li>
      <li><a>add</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Add Categorieen</h1>

  <form action="/dashboard/categorieen/add" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">categorie naam</span>
          </label>
          <input type="text" name="naam" placeholder="********" class="input input-bordered w-full" required />
        </div>

        <!-- color -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">kleur in hex</span>
          </label>
          <input type="color" name="kleur" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Add</button>
  </form>
</div>