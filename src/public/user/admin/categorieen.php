
<?php 

$categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`');
var_dump($categorieen);

?>
<a href="/dashboard/categorieen/add"><button class="btn btn-active">voeg nieuwe categorieen toe</button></a>
<?php

foreach($categorieen as $categorie){
?>
<div class="flex">
    <div class="overflow-x-auto flex[1.8]">
    <table class="table table-lg">
        <!-- head -->
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>color</th>
            <th>wijzigen</th>
        </tr>
        </thead>
        <tbody>
        <!-- row 1 -->
        <tr>
            <th><?php echo $categorie['id'] ?></th>
            <td><?php echo $categorie['naam'] ?></td>
            <td class=""><span class="shadow rounded-full bg-red p-2 bg-#ff0000"><?php echo $categorie['kleur hexadeximaal'] ?></span></td>
            <td ><a href="/dashboard/categorieen/change"><button class="btn btn-primary">wijzigen</button></a></td>
            <td ><a href="/dashboard/categorieen/delete"><button class="btn btnc-red">delete</button></a></td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="flex[0.3]"></div>
</div>
<?php } ?>