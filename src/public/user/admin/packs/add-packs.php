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
      <li>packs</li>
      <li><a>add</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Add Packs</h1>
  
  

  <form action="/dashboard/categorieen/add" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">pack naam</span>
          </label>
          <input type="text" name="naam" placeholder="********" class="input input-bordered w-full" required />
        </div>

        <!-- photo -->
        <div class="form-control md:flex-1">
            <label class="label ">pack picture</label>
              <input type="file" name="file" class="file-input file-input-bordered" required />
        </div>
      </div>
       <!-- photo -->
       <div class="form-control md:flex-1">
       <label class="label ">kaarten in packs </label>
              <?php
                $kaarten = fetchSingle('SELECT * FROM tblkaart');
                    ?>
                  <select class='select select-bordered' name='categorie[]' required multiple>
                    <option disabled selected>Choose a category</option>
                    <?php  
                    foreach ($kaarten as $kaart) {
                      ?>
                      <option class="py-2" value="<?php echo $kaart["kaartID"]; ?>">
                        <?php echo $kaart["naam"]; ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
        </div>
      </div>


    <button name="update" class="btn btn-primary">Add</button>
  </form>
</div>