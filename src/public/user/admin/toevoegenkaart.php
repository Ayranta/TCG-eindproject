


  <?php
  include "functions/kaartfuncties.php";
  include "functions/Gebruikerfuncties.php";
  if(session_status() === PHP_SESSION_NONE){
    session_start();
}

  if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $levens = $_POST['levens'];
    $aanval1 = $_POST['aanval1'];
    $damage1 = $_POST['damage1'];
    $aanval2 = $_POST['aanval2'];
    $damage2 = $_POST['damage2'];
    $categorie = $_POST['categorie'];

    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/TCG-eindproject/public/img/";
    $file = $_FILES['file'];
    
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    $fileExt = explode('.', $file_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png','jfif');

    if (in_array($fileActualExt, $allowed)){
        if($file_error === 0){
            if($file_size < 1000000/* aantal kilobytes een foto mag zijn '1000mb' */){
                $file_name_new = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'public/img/'.$file_name_new;
                move_uploaded_file($file_tmp, $fileDestination);
            }else{
                echo'error';
                exit;
            }
        }else{
            echo 'Error uploading';
        }
    }else{
        echo 'Wrong type';
        
    }
    if (addProduct($mysqli, $naam, $categorie, $levens, $aanval1, $damage1, $aanval2, $damage2, $file_name_new)) {
      header('Location: /');
      exit;

    }
  }
  ?>
  <div>
    <form class="form-control h-full flex items-center justify-center" action="/admin/user/toevoegenkaart" method="post" enctype="multipart/form-data">
      <div class="card w-full max-w-lg shadow-2xl p-8 mx-auto justify-center items-center">
        <h2 class="text-2xl mb-4">Add Card</h2>
        <div class="flex flex-col gap-2"> 
        <div class="flex flex-col w-full"> 
              <label class="label">naam</label>
              <input type="text" name="naam" placeholder='naam kaart' class="input input-bordered w-full max-w-md " required />
            </div> 
          <div class="flex flex-row gap-2"> 
            <div class="flex flex-col w-full"> 
              <label class="label">aanval1</label>
              <input type="text" name="aanval1" placeholder='naam aanval1' class="input input-bordered w-full max-w-md " required />
            </div>
            <div class="flex flex-col w-full"> 
              <label class="label ">damage1</label>
              <input type="number" name="damage1" placeholder='nummer damage1' step="0.01" min="0.00" class="input input-bordered w-full max-w-md " required />
            </div>
          </div>
          <div class="flex flex-col gap-2">  
          <div class="flex flex-row gap-2"> 
            <div class="flex flex-col w-full"> 
              <label class="label">aanval2</label>
              <input type="text" name="aanval2" placeholder='naam aanval2' class="input input-bordered w-full max-w-md " required />
            </div>
            <div class="flex flex-col w-full"> 
              <label class="label ">damage2</label>
              <input type="number" name="damage2" placeholder='nummer damage2' step="0.01" min="0.00" class="input input-bordered w-full max-w-md " required />
            </div>
          </div>
            <div class="flex flex-col w-full"> 
              <label class="label ">levens</label>
              <input type="number" name="levens" placeholder='aantal hp' step="0.01" min="0.00" class="input input-bordered w-full max-w-md " required />
            </div>
          <div class="flex flex-row gap-2">
            <div class="flex flex-col w-full"> 
              <label class="label ">kaart Picture</label>
              <input type="file" name="file" class="file-input file-input-bordered" required />
            </div>
          </div>
          <div class="flex flex-row gap-2">
            <div class="flex flex-col w-full"> 
              <label class="label ">Category</label>
              <?php
                if (getAllCategories($mysqli)) {
                  print "<select class='select select-bordered' name='categorie' required >
                  <option disabled selected>Choose a category</option>";

                  foreach (getAllCategories($mysqli) as $row) {
                    print " <option value= " . $row["naam"] . " >" . $row["naam"] . " </option>";
                  }
                }
              ?>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" class="btn border-none hover:text-white hover:bg-black" value='ADD PRODUCT'>
        </div>
      </div>
    </form>
  </div>
</html>