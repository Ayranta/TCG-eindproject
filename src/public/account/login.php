<?php


require_once DATABASE . '/connect.php';
include "./functions/Gebruikerfuncties.php";
if (isset($_SESSION["login"])) {
    header("location: / ");
}



if (isset($_POST["submit"])) {
    $loginfetch = fetch("SELECT * FROM tblgebruikers,tblgebruiker_profile");
 $email = $_POST["email"];
 $password = $_POST["password"];
 if(isEmailCorrect($loginfetch,$email)){
     if(isPasswordCorrect($loginfetch,$password,$email)){  
        $gebruikersid = getGebruikersid($loginfetch,$email);
             $_SESSION["login"]= $gebruikersid;
             if(checkIfAdmin($loginfetch,$email)){
                $_SESSION["admin"] = 1;
             }

             header("Location: / ");
         } else {

        
         }
     }
     header('location: /account/login?error');
}



?>
<?php
//require 'src\lang.php';
?>
<div class="flex justify-start items-start">
        <a href="index.php" class="btn btn-ghost normal-case text-xl text-black">TCG-Game</a>
        <div class="card w-full max-w-lg h-screen shadow-2xl bg-white ml-auto">
        <form class="card-body" method="post" action="/account/login">
        <?php
            if(isset($_GET["error"])){
                print'<div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Error! failed login.</span>
            </div>';
            }
        ?>    
        <div class="form-control gap-2">
            <h2 class="text-black text-2xl ">login</h2>
            <label class="label">
                <span class="label-text text-black">Email</span>
            </label>
            <input type="email"  name="email" placeholder=Email class="input input-bordered w-full max-w-md bg-white text-black" required/>
            <label class="label">
                <span class="label-text text-black">Password</span>
            </label>
            <input type="password"  name="password" placeholder=password class="input input-bordered w-full max-w-md bg-white text-black" required/>
            <input type="submit" name="submit" value=login class="btn text-black bg-white mt-3 w-full border-white hover:text-white hover:bg-black"/>
        </form>
        <div class="flex justify-center mt-2">
            <a href="/account/register" class="link text-black">I don't have an account</a>
        </div>
    </div>
</div>
