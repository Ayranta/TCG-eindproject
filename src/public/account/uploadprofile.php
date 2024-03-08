<?php
  include "functions/kaartfuncties.php";
  include "functions/Gebruikerfuncties.php";
  if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if (isset($_POST['submit'])) {
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/TCG-eindproject/public/img/profilePic/";
$file = $_FILES['file'];

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_error = $_FILES['file']['error'];
$file_type = $_FILES['file']['type'];

$fileExt = explode('.', $file_name);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'jfif');

if (in_array($fileActualExt, $allowed)){
    if($file_error === 0){
        if($file_size < 1000000/* aantal kilobytes een foto mag zijn '1mb' */){
            $file_name_new = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'public/img/profilePic/'.$file_name_new;
            move_uploaded_file($file_tmp, $fileDestination);
        }else{
            echo'error';
            exit;
        }
    }else{
        echo 'Error uploading';
        exit;
    }
}else{
    echo 'Wrong type';
    exit;
}
$sql = "UPDATE profielfoto FROM tblgebruiker_profile WHERE userid = ". $_SESSION['login'];


$sql = "UPDATE tblgebruiker_profile SET profielfoto = ? WHERE userid = ". $_SESSION['login'];
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $file_name_new);

$stmt->execute();

header('location: /');
exit;

}
?>

<div>
<form class="form-control h-full w-full flex items-center justify-center" action="/account/uploadprofile" method="post" enctype="multipart/form-data">
    <div class="card w-full max-w-lg shadow-2xl p-8 mx-auto justify-center items-center">
        <div class="flex flex-row gap-2">
            <div class="flex flex-col w-full"> 
              <label class="label justify-center">Profile Picture</label>
              <input type="file" name="file" class="file-input file-input-bordered w-auto" required />
            </div>
        </div>
          <input type="submit" name="submit" class="btn border-none hover:text-white hover:bg-black" value='Change Picture'>
    </div>
</div>    