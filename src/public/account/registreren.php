<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';
if (isset($_POST['register'])) {
  register($_POST,$_FILES);
  var_dump($_POST);
  exit();
}


function register($formData) {


  $email = $formData['email'];
  $username = $formData['username'];
  $password = $formData['password'];
  $passwordConfirm = $formData['passwordConfirm'];
  
  $data = fetch("SELECT * FROM tblgebruikers WHERE email = ?", [ 'type' => 's','value' => $email ]);
  
  if ($data) {
    header('Location: /account/register?error=email');
    exit();
  }
  
  $data = fetch("SELECT * FROM tblgebruikers WHERE gebruikernaam = ?", [
    'type' => 's',
    'value' => $username,
  ]);
  
  if ($data) {
    header('Location: /account/register?error=username');
    exit();
  }
  
  if ($password !== $passwordConfirm) {
    header('Location: /account/register?error=password');
    exit();
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /account/register?error=email');
  }
  
  $password = password_hash($password, PASSWORD_ARGON2ID);
  $initialized = insertUser($username, $password, $email);

  if (!$initialized) {
    header('Location: /account/register?error=server');
    return;
  }
  
  header('Location: /account/login?success=register');
  exit();
}

function insertUser($username, $password, $email) {
  global $connection;
  $userData = insert(
    'INSERT INTO tblgebruikers (gebruikernaam, wachtwoord, email) VALUES (?, ?, ?)',
    ['type' => 's', 'value' => $username],
    ['type' => 's', 'value' => $password],
    ['type' => 's', 'value' => $email]
  );

  $userId = mysqli_insert_id($connection);
  $profiel = fetch("SELECT * FROM tblgebruiker_profile ");

  $userProfileData = insert(
    'INSERT INTO tblgebruiker_profile (userid,profielfoto,theme,admin,Levels,Expirience,coins,titleid) VALUES (?, ?, ?,?,?, ?, ?,?)',
    ['type' => 'i', 'value' => $userId],
    [
      'type' => 's',
      'value' => 'default.png',
    ],
    ['type' => 's', 'value' => 'light'],
    ['type' => 'i', 'value' => '0'],
    ['type' => 'i', 'value' => '1'],
    ['type' => 'i', 'value' => '10'],
    ['type' => 'd', 'value' => '50.0'],
    ['type' => 'i', 'value' => '0'],
  );
  $kaarten1 = insert(
    "INSERT INTO tblgebruikerkaart (KaartID, GebruikerID) VALUES (?, ?)",
    ["type" => 'i', 'value' => 12],
    ["type" => 'i', 'value' => $userId]
   );
  $kaarten2 = insert(
   "INSERT INTO tblgebruikerkaart (KaartID, GebruikerID) VALUES (?, ?)",
   ["type" => 'i', 'value' => 2],
   ["type" => 'i', 'value' => $userId]
  );
  $title = insert(
   "INSERT INTO tbltitlegebruiker (userid, titleid) VALUES (?, ?)",
   ["type" => 'i', 'value' => $userId],
   ["type" => 'i', 'value' => 1]
  );


  return $userData && $userProfileData && $kaarten2 && $kaarten1 && $title;
}

?>
<?php
if (isset($_SESSION['login'])) {
  header('Location: /');
  exit();
} ?>

<div class="min-h-[80svh] w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2">
    <ul>
      <li><a href="/">Home</a></li>
      <li>Account</li>
      <li><a href="/account/registreren">Register</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Create a new account</h1>

  <form action="/account/registreren" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      
      <div class="flex flex-col gap-4 md:flex-row">
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="email" placeholder="john.doe@gmail.com" class="input input-bordered w-full" required />
        </div>
        
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="username" placeholder="john.doe" class="input input-bordered w-full" required />
        </div>
      </div>
      
      <div class="flex flex-col gap-4 md:flex-row">
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" name="password" placeholder="Make it a good one!" class="input input-bordered w-full" required />
        </div>
        
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Confirm password</span>
          </label>
          <input type="password" name="passwordConfirm" placeholder="Confirm..." class="input input-bordered w-full" required />
        </div>
        
      </div>
     
    </div>

    <button name="register" class="btn btn-primary">Register</button>
  </form>

  <div class="w-full text-center mt-8">
    <a class="link" href="/account/login">I already have an account</a>
  </div>
</div>


