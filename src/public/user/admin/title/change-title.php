<?php
if (!isset($_SESSION['login'])) {
  header('Location: /');
  exit();
}



require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userId = $_SESSION['login'];


$titleId = $_GET['titleid'];

$title = fetchSingle('SELECT * FROM tbltitels WHERE id = ?', ['type' => 'i', 'value' => $titleId]);


if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
      
        updateTitle($titleId,$_POST);
        return;
    }
      

     header('Location: /');
     exit();
       
}

function updateTitle($titleId, $formData) {
    $newname = $formData['naam'];
    $newdescription = $formData['description'];


    var_dump($titleId);
    $query = 'SELECT * FROM tbltitels WHERE id = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $titleId]);


    if ($data['name'] === $newname && $data['description'] === $newdescription) {
      header('Location: /dashboard/titels?error=noChanges');
      exit();
    }
    
    $query = 'UPDATE tbltitels SET name = ?, description = ? WHERE id = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newname],
      ['type' => 's', 'value' => $newdescription],
      ['type' => 'i', 'value' => $titleId],
    );
    
    if ($update) {
            header('Location: /dashboard/titels');
        exit();
    }
    
        header('Location: /dashboard/titels ?error=notUpdatedTitle');
    exit();
}
?>



<div class="w-full flex flex-col justify-center items-center  py-8 ">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 ">
    <ul>
      <li><a href="/">Home</a></li>
      <li>title</li>
      <li><a>change</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Change Title</h1>

  <form action="/dashboard/title/change?titleid=<?php echo $titleId ?>" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- categorie naam -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text" name="naam" value="<?php echo $title[0]['name'] ?>" class="input input-bordered w-full" required />
        </div>

        <!-- color -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
          <input type="text" name="description" value="<?php echo $title[0]['description'] ?>"  class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Add</button>
  </form>
</div>