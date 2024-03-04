<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);



require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';

$sql = "SELECT * FROM tblgebruikers WHERE reset_token_hash = ?";

//stmt = statement
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user === null) {
    die("token not found");
}

if(strtotime($user["reset_token_expires_at"]) <= time()){
    die("token has expired");
}

?>

<h1 class="md:text-center text-4xl font-bold mb-8">Reset Password</h1>

<form method="post" action="/account/process-reset-password" class = "flex flex-col gap-4 w-80 md:max-w-2xl p-4 shadow-md rounded-2xl mx-auto mt-16">
  
    <div class="flex flex-col gap-4">
  
  <div class="flex flex-col gap-4 md:flex-row">
    
  <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

    <div class="form-control md:flex-1">
      <label class="label">
        <span class="label-text">New Password</span>
      </label>
      <input type="password" name="password"  class="input input-bordered w-full" required />
    </div>
    <div class="form-control md:flex-1">
      <label class="label">
        <span class="label-text">Repeat password</span>
      </label>
      <input type="password" name="password_confirmation"  class="input input-bordered w-full" required />
    </div>
</div>
<button name="send" class="btn btn-primary">send</button>
</form>






