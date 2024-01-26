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

$groupId = $_GET['groupId'];
$query = "SELECT * FROM levelgroups WHERE GroupID = ?";
$data = fetch($query, ['type' => 'i', 'value' => $groupId]);



if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        var_dump($_POST);
        updateLevelGroup($groupId, $_POST);
        return;
    }
      
    header('Location: /');
    exit();
       
}

function updateLevelGroup($groupId, $formData) {
  
    $newGroupName = $formData['GroupName'];
    

    $query = 'SELECT * FROM levelgroups WHERE GroupID = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $groupId]);
    
    if (
      $data['GroupName'] === $newGroupName
    ) {
      header('Location: /admin/level?error=noChanges');
      exit();
    }
    
    $query =
      'UPDATE levelgroups SET GroupName = ? WHERE GroupID = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newGroupName],
      ['type' => 's', 'value' => $groupId],
    );
    var_dump($update);
    if ($update) {
      
      header('Location: /admin/level?succes');
      exit();
    }
    
   header('Location: /admin/level?error');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>group</li>
      <li>change</li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit your account details</h1>

  <form action="/admin/group/change?groupId=<?php echo $groupId ?>" method="post" class="flex flex-col gap-4 w-80 md:max-w-2xl p-4 shadow-md rounded-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- Username -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Group name</span>
          </label>
          <input type="text" name="GroupName" value="<?php echo $data['GroupName']; ?>" class="input input-bordered w-full" required />
        </div>
    </div>
    <button name="update" class="btn btn-primary">Update</button>
  </form>
</div>
</div>
</div>