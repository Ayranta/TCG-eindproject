
<?php 

$titels = fetchSingle('SELECT * FROM `tbltitels`');


?>

<?php


?>
<div class=" item-center mx-80 shadow-xl rounded-2xl mt-8">
    <div class ="mx-4 ">
        <a href="/dashboard/title/add"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
            <th>description</th>
            <th>change</th>
        </tr>
        </thead>
        <?php foreach($titels as $titel){ ?>
        <tbody>
        <!-- row 1 -->
        
        <tr>
            <th><?php echo $titel['id'] ?></th>
            <td><?php echo $titel['name'] ?></td>
            <td><?php echo $titel['description'] ?></td>
            <td ><a href="/dashboard/title/change?titleid=<?php echo $titel['id']?>"><button class="btn btn-primary">change</button></a></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
    </div>
</div>
