<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/catalog/users.php';


if(isset($_GET['categoryid'])){
    $categoryid = $_GET['categoryid'];

    if (isset($_POST['button'])) {
      if($_POST['button']==='yes'){
        
        $delete_category=insert('DELETE FROM kaart_categorieen WHERE `id` = ? ',['type' => 'i', 'value' => $categoryid]);

        if($delete_category){
            header('Location: /dashboard/categorieen?success=deleteProduct');
        }else{
            header('Location: /dashboard/categorieen?error=deleteProduct');
        }
      }elseif($_POST['button']==='no'){
        header('Location: /dashboard/categorieen?error=clickedno');
      }
   } 

?>
<form action="/dashboard/categorieen/delete?categoryid=<?php echo $categoryid?>" method="post" class = ""  >
   
<div class="card w-96 bg-base-100 shadow-xl m-auto mt-32">
  <div class="card-body items-center text-center">
    <h2 class="card-title">Delete</h2>
    <p>Are You Very Sure That You Want To Delete This Category</p>
    <div class="card-actions justify-end">
      
    <button name="button" value="yes" class="btn btn-primary">YES</button>
    <button name="button" value="no" class="btn btn-accent">NO</button>
    </div>
  </div>
</div>
   
  </form>
  <?php
}else{

header('Location: /dashboard/categorieen?error=notacategory');
}
?>
