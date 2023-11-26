<?php
if (!isset($_SESSION['login'])) {
  header('Location: /');
  exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$categoryId = $_GET['categoryid'];
$query = "SELECT * FROM kaart_categorieen WHERE id = ?";
$data = fetch($query, ['type' => 'i', 'value' => $categoryId]);


if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        updateCategory($categoryId, $_POST);
        return;
    }
      
      header('Location: /');
      exit();
       
}

function updateCategory($categoryId, $formData) {

    $newname = $formData['naam'];
    $newcolor = $formData['kleur'];


    $query = 'SELECT * FROM kaart_categorieen WHERE id = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $categoryId]);

    $newcolor = ltrim($newcolor, '#');

    $correcthex = preg_match('/^[a-fA-F0-9]{6}$/', $newcolor);

    if(!$correcthex){
       header('Location: /dashboard/categorieen?error=notACorrectHex ' );
       exit;
    }

    if (
      $data['naam'] === $newname &&
      $data['kleur hex'] === $newcolor 
    ) {
      header('Location: /dashboard/categorieen?error=noChanges');
      exit();
    }
    
    $query =
      'UPDATE kaart_categorieen SET naam = ?, `kleur hex` = ? WHERE id = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newname],
      ['type' => 's', 'value' => $newcolor],
      ['type' => 's', 'value' => $categoryId],
    );
    var_dump($update);  
    
    if ($update) {
        header('Location: /dashboard/categorieen ');
      exit();
    }
    
    header('Location: /dashboard/categorieen/change?error=accountUpdate');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard/categorieen" > categorieen</a></li>
      <li><a href="/dashboard/categorieen/change?categoryid=<?php echo $data['id']?>">change</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit categorieen</h1>

  <form action="/dashboard/categorieen/change?categoryid=<?php echo $data['id']?>" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">categorie naam</span>
          </label>
          <input type="text" name="naam" value="<?php echo $data['naam'] ?>" class="input input-bordered w-full" required />
        </div>

        <!-- color -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">kleur in hex</span>
          </label>
          <input type="color" name="kleur" value = "#<?php echo $data['kleur hex'] ?>" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Wijzigen</button>
  </form>
</div>