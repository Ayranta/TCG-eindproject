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

$levelId = $_GET['levelId'];
$query = "SELECT * FROM PlayerLevels WHERE LevelID = ?";
$data = fetch($query, ['type' => 'i', 'value' => $levelId]);



if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        var_dump($_POST);
        updateLevel($levelId, $_POST);
        return;
    }
      
    header('Location: /');
    exit();
       
}

function updateLevel($levelId, $formData) {
  
    $newGroupID = $formData['GroupID'];
    $newExpirience = $formData['ExpirienceRequired'];

    $query = 'SELECT * FROM PlayerLevels WHERE LevelID = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $levelId]);
    var_dump($data);
    
    if (
      $data['GroupId'] === $newGroupID &&
      $data['ExpirienceRequired'] === $newExpirience
    ) {
      header('Location: /admin/level?error=noChanges');
      exit();
    }
    
    $query =
      'UPDATE PlayerLevels SET GroupID = ?, ExpirienceRequired = ? WHERE LevelID = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newGroupID],
      ['type' => 's', 'value' => $newExpirience],
      ['type' => 's', 'value' => $levelId],
    );
    var_dump($update);
    if ($update) {
      
       // header('Location: /admin/level?succes');
      exit();
    }
    
   // header('Location: /admin/level?error=accountUpdate');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>levels</li>
      <li>change</li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit your account details</h1>

  <form action="/admin/level/change?levelId=<?php echo $levelId ?>" method="post" class="flex flex-col gap-4 w-80 md:max-w-2xl p-4 shadow-md rounded-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- Usernale -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Group Id</span>
          </label>
          <input type="number" name="GroupID" value="<?php echo $data['GroupID']; ?>" class="input input-bordered w-full" required />
        </div>
    </div>
        <!-- Email -->
    <div>
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">required expirience</span>
          </label>
          <input type="number" name="ExpirienceRequired" value="<?php echo $data['ExpirienceRequired']; ?>" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Update</button>
  </form>
</div>
</div>
</div>