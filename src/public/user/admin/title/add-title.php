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
      
        insertTitle($_POST);
        return;
    }
      

     header('Location: /');
     exit();
       
}

function insertTitle($formData) {
    $data = fetchSingle('SELECT * FROM tbltitels'); // replace 'title_table' with your actual title table name
    
    $newname = $formData['naam'];
    $newdescription = $formData['description'];

    foreach($data as $Data){
      if($Data['name'] === $newname){
        header('Location: /dashboard/title/add?error=titleAlreadyExists'); 
        exit;
      }
    }

    $query ='INSERT INTO tbltitels(name, description) VALUES (?, ?)'; // replace 'title_table' with your actual title table name

    $insert = insert(
      $query,
      ['type' => 's', 'value' => $newname],
      ['type' => 's', 'value' => $newdescription],
    );
    
    if ($insert) {
        header('Location: /dashboard/title');
        exit();
    }
    
    header('Location: /dashboard/title/add?error=notAddedTitle');
    exit();
}
?>



<div class="w-full flex flex-col justify-center items-center  py-8 ">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 ">
    <ul>
      <li><a href="/">Home</a></li>
      <li>title</li>
      <li><a>add</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Add Title</h1>

  <form action="/dashboard/title/add" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" name="naam" placeholder="********" class="input input-bordered w-full" required />
        </div>

        <!-- color -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
          <input type="text" name="description" placeholder="********" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Add</button>
  </form>
</div>