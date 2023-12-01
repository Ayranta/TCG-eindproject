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

$userId = $_GET['gebruikerid'];
$query = "SELECT * FROM tblgebruikers WHERE gebruikerid = ?";
$data = fetch($query, ['type' => 'i', 'value' => $userId]);



if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        var_dump($_POST);
        updateProfile($userId, $_POST);
        return;
    }
      
    //  header('Location: /');
      //exit();
       
}

function updateProfile($userId, $formData) {

      
    $query = 'SELECT * FROM tblgebruikers WHERE gebruikernaam = ?';
    $data = fetch($query, ['type' => 's', 'value' => $formData['username']]);
  
    if ($data && $data['gebruikerid'] !== $userId) {
      header('Location: /dashboard/users?error=usernameTaken');
      exit();
    }
  
    $newUsername = $formData['username'];
    $newEmail = $formData['email'];

    $query = 'SELECT * FROM tblgebruikers WHERE gebruikerid = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $userId]);
    
    if (
      $data['gebruikernaam'] === $newUsername &&
      $data['email'] === $newEmail 
    ) {
      header('Location: /dashboard/users?error=noChanges');
      exit();
    }
    
    $query =
      'UPDATE tblgebruikers SET gebruikernaam = ?, email = ? WHERE gebruikerid = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newUsername],
      ['type' => 's', 'value' => $newEmail],
      ['type' => 's', 'value' => $userId],
    );
    if ($update) {
      
        header('Location: /dashboard/users');
      exit();
    }
    
    header('Location: /dashboard/users?error=accountUpdate');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>users</li>
      <li><a href="/admin/users/edit?gebruikerid=<?php echo $userId ?>">update</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit your account details</h1>

  <form action="/admin/users/edit?gebruikerid=<?php echo $userId ?>" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- Usernale -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="username" value="<?php echo $data['gebruikernaam']; ?>" class="input input-bordered w-full" required />
        </div>

        <!-- Email -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="email" value="<?php echo $data['email']; ?>" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Update</button>
  </form>
</div>