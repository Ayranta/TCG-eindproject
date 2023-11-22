
<?php 

$categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`');


?>
<a href="/dashboard/categorieen/add"><button class="btn btn-active">voeg nieuwe categorieen toe</button></a>
<?php


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
            <th>delete</th>
        </tr>
        </thead>
        <?php foreach($categorieen as $categorie){ ?>
        <tbody>
        <!-- row 1 -->
        
        <tr>
            <th><?php echo $categorie['id'] ?></th>
            <td><?php echo $categorie['naam'] ?></td>
            <td class=""><span class="shadow rounded-full bg-red p-2 bg-[#<?php echo $categorie['kleur hex'] ?>]"><?php echo $categorie['kleur hex'] ?></span></td>
            <td ><a href="/dashboard/categorieen/change?categoryid=<?php echo $categorie['id']?>"><button class="btn btn-primary">wijzigen</button></a></td>
            <td ><a href="/dashboard/categorieen/delete?categoryid=<?php echo $categorie['id'] ?>"><button class="btn btnc-red">delete</button></a></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
    </div>
    <div class="flex[0.3]"></div>
</div>
