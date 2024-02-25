<?php
if (!isset($_SESSION['login'])) {
  header('Location: /account/login');
  exit();
}
if (!isset($_SESSION['admin'])) {
  header('Location: /');
  exit();
}
if ($_SESSION['admin'] === 0) {
  header('Location: /');
  exit();
}


if (isset($_GET['packid'])) {
  $packid = $_GET['packid'];

  if (isset($_POST['button'])) {
    if ($_POST['button'] === 'yes') {

      $delete_pack = insert('DELETE FROM tblpacks WHERE `packid` = ? ', ['type' => 'i', 'value' => $packid]);
      $delete_packcards= insert('DELETE FROM tblpackcards WHERE `packid` = ? ', ['type' => 'i', 'value' => $packid]);

      if ($delete_pack) {
        header('Location: /admin/user/packs?success=deletePack');
      } else {
        header('Location: /admin/user/packs?error=deletePack');
      }
    } elseif ($_POST['button'] === 'no') {
      header('Location: /admin/user/packs?error=clickedno');
    }
  }

?>
  <form action="/admin/user/packs/delete?packid=<?php echo $packid ?>" method="post" class="">

    <div class="card w-96 bg-base-100 shadow-xl m-auto mt-32">
      <div class="card-body items-center text-center">
        <h2 class="card-title">Delete</h2>
        <p>Are You Very Sure That You Want To Delete This Pack</p>
        <div class="card-actions justify-end">

          <button name="button" value="yes" class="btn btn-primary">YES</button>
          <button name="button" value="no" class="btn btn-accent">NO</button>
        </div>
      </div>
    </div>

  </form>
<?php
} else {

  header('Location:/admin/user/packs?error=notapack');
}
?>