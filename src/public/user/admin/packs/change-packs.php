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


$packId = $_GET['packID'];

$query = "SELECT * FROM tblpacks WHERE packid = ?";
$data = fetch($query, ['type' => 'i', 'value' => $packId]);

if(isset($_POST['update'])){
    if (isset($_SESSION['login'])) {
        updatePack($packId, $_POST);
        return;
    }
}

function updatePack($packId, $formData) {
    $newPackName = $formData['packname'];
    $newPrice = $formData['price'];

    $query = 'SELECT * FROM tblpacks WHERE packid = ?';
    $data = fetch($query, ['type' => 'i', 'value' => $packId]);
    
    if (
      $data['packNaam'] === $newPackName &&
      $data['price'] === $newPrice 
    ) {
      header('Location: /admin/user/packs?error=noChanges');
      exit();
    }
    
    $query =
      'UPDATE tblpacks SET packNaam = ?, price = ? WHERE packid = ?';
    $update = insert(
      $query,
      ['type' => 's', 'value' => $newPackName],
      ['type' => 'i', 'value' => $newPrice],
      ['type' => 'i', 'value' => $packId],
    );
    if ($update) {
        header('Location: /admin/user/packs');
      exit();
    }
    
    header('Location: /admin/user/packs?error=packUpdate');
    exit();
  }
?>

<!-- HTML form for updating pack details -->

<div class="w-full flex flex-col justify-center items-center px-8 py-8">
  <div class="w-full flex justify-center text-sm breadcrumbs mb-2 md:hidden">
    <ul>
      <li><a href="/">Home</a></li>
      <li>packs</li>
      <li><a href="/admin/user/packs/change?packID=<?php echo $packId ?>">update</a></li>
    </ul>
  </div>

  <h1 class="md:text-center text-4xl font-bold mb-8">Edit your pack details</h1>

  <form action="/admin/user/packs/change?packID=<?php echo $packId ?>" method="post" class="flex flex-col gap-8 w-full md:max-w-2xl">
    <div class="flex flex-col gap-4">
      
      <div class="flex flex-col gap-4 md:flex-row">
        <!-- Pack Name -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Pack Name</span>
          </label>
          <input type="text" name="packname" value="<?php echo $data['packNaam']; ?>" class="input input-bordered w-full" required />
        </div>

        <!-- Price -->
        <div class="form-control md:flex-1">
          <label class="label">
            <span class="label-text">Price</span>
          </label>
          <input type="number" name="price" value="<?php echo $data['price']; ?>" class="input input-bordered w-full" required />
        </div>
      </div>


    <button name="update" class="btn btn-primary">Update</button>
  </form>
</div>