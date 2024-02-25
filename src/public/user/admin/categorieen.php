
<?php 

$categorieen = fetchSingle('SELECT * FROM `kaart_categorieen`');


?>

<?php


?>
<div class=" item-center mx-80 shadow-xl rounded-2xl">
    <div class ="mx-4 ">
        <a href="/dashboard/categorieen/add"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        </a>
    </div>
    <div class="overflow-x-auto ">
    <table class="table table-lg">
        <!-- head -->
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>color</th>
            <th>change</th>
            <th>delete</th>
        </tr>
        </thead>
        <?php foreach($categorieen as $categorie){ ?>
        <tbody>
        <!-- row 1 -->
        
        <tr>
            <th><?php echo $categorie['id'] ?></th>
            <td><?php echo $categorie['naam'] ?></td>
            <td class=""><span class="shadow rounded-full text-black p-2 bg-[#<?php echo $categorie['kleur hex'] ?>]"><?php echo $categorie['kleur hex'] ?></span></td>
            <td ><a href="/dashboard/categorieen/change?categoryid=<?php echo $categorie['id']?>"><button class="btn btn-primary">change</button></a></td>
            <td ><a href="/dashboard/categorieen/delete?categoryid=<?php echo $categorie['id'] ?>"><button class="btn btnc-red">delete</button></a></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
    </div>
</div>
