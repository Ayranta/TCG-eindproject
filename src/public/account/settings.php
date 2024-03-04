<?php
if (!isset($_SESSION['login'])) {
  header('Location: /');
  exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userId = $_SESSION['login'];
$query = "SELECT * FROM tblgebruikers WHERE gebruikerid = ?";
$data = fetch($query, ['type' => 'i', 'value' => $userId]);



if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        updateProfile($_SESSION['login'], $_POST);
        return;
    }
      
      header('Location: /');
      exit();
       
}

function updateProfile($userId, $formData) {

  $query = 'SELECT * FROM tblgebruikers WHERE gebruikernaam = ?';
  $data = fetch($query, ['type' => 's', 'value' => $formData['username']]);


  if ($data && $data['gebruikerid'] != $userId) {
   header('Location: /account/settings/edit?error=usernameTaken');
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
      header('Location: /account/settings/edit?error=noChanges');
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
      header('Location: / ');
      exit();
    }
    
    header('Location: /account/settings/edit?error=accountUpdate');
    exit();
  }
?>



<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>Account</li>
      <li><a href="/account/settings/edit">Settings</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit your account details</h1>

  <form action="/account/settings/edit" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
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