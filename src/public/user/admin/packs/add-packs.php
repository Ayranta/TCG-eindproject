<?php
if (!isset($_SESSION['login'])) {
  header('Location: /');
  exit();
}
if(!isset($_SESSION['admin'])){
  header('Location: /');
}
if($_SESSION['admin']===0){
  header('Location: /');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userId = $_SESSION['login'];




if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
        insertPack($_POST);
        return;
      
    }
      

     header('Location: /');
     exit();
       
}

function insertPack($formData) {
    $data = fetchSingle('SELECT * FROM tblpacks');
    
   
    $newname=$formData['naam'];
    $newprice=$formData['price'];
    $newcards=$formData['cards'];
    
    foreach($data as $Data){
    
      if($Data['packNaam']===$newname){
        header('Location: /admin/user/packs/add?error=nameAlreadyExists'); 
        exit;
      }
    }
    
    
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/public/img/";

    $file = $_FILES['file'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    $fileExt = explode('.', $file_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)){
      if($file_error === 0){
        if($file_size < 1000000/* aantal kilobytes een foto mag zijn '1000mb' */){
          $file_name_new = uniqid('', true).".".$fileActualExt;
          $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/public/pack-img/' . $file_name_new;
          move_uploaded_file($file_tmp, $fileDestination);
        }else{
          header('Location: /admin/user/packs/add?error=fileTooBig');
          exit;
        }
      }else{
        header('Location: /admin/user/packs/add?error=uploadError');
        exit;
      }
    }else{
      header('Location: /admin/user/packs/add?error=wrongFileType');
      exit;
    }
    

    $query ='INSERT INTO tblpacks(packNaam, packImg, price) VALUES (?, ?, ?)';

    $insert1 = insert(
        $query,
        ['type' => 's', 'value' => $newname],
        ['type' => 's', 'value' => $file_name_new],
        ['type' => 'i', 'value' => $newprice],
    );


    $newpackID = fetchSingle('SELECT packId FROM tblpacks WHERE packNaam = ?', ['type' => 's', 'value' => $newname]);

    foreach($newcards as $newcard){
  
      $newcards = $newcard;
    
      $insert2 = insert(
        'INSERT INTO tblpackcards(packID, kaartID) VALUES (?,?)',
        ['type' => 'i', 'value' => $newpackID[0]['packId']],
        ['type' => 'i', 'value' => $newcard],
      );
    
  
}
    
    if ($insert1&&$insert2) {
      
       header('Location: /admin/user/packs ');
      exit();
    }
    
    header('Location: /admin/user/packs/add?error=notAddedPack');
    exit();
  }
  
?>



<div class="w-full flex flex-col justify-center items-center  py-8 ">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>packs</li>
      <li><a>add</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Add Packs</h1>
  
  

  <form action="/admin/user/packs/add" method="post" class="flex flex-col gap-8 w-full md:max-w-3xl" enctype="multipart/form-data">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">pack naam</span>
          </label>
          <input type="text" name="naam"  class="input input-bordered w-full" required />
        </div>

        <!-- photo -->
        <div class="form-control md:flex-1 mx-auto">
            <label class="label ">pack picture</label>
              <input type="file" name="file" class="file-input file-input-bordered" required />
        </div>
        
      </div>
      <div class="form-control md:flex-1">
            <label class="label ">price</label>
              <input type="number" name="price" class="file-input file-input-bordered" required />
        </div>
      
       <!-- photo -->
       <div class="form-control md:flex-1">
       <label class="label ">kaarten in packs (use ctr to select more that one)</label>
              <?php
                $kaarten = fetchSingle('SELECT * FROM tblkaart');
                    ?>
                  <select class='select select-bordered' name='cards[]' required multiple>
                    <option disabled selected>Choose a category</option>
                    <?php  
                    foreach ($kaarten as $kaart) {
                      ?>
                      <option class="py-2" value="<?php echo $kaart["kaartID"]; ?>">
                        id: <?php echo $kaart["kaartID"]; ?>
                        / naam: <?php echo $kaart["naam"]; ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
        </div>
      </div>


    <button name="update" class="btn btn-primary ">Add</button>
  </form>
</div>