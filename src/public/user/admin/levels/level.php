<?php 
$levelData=fetchSingle('SELECT * From PlayerLevels');

$groupData = fetchSingle('SELECT * FROM LevelGroups');


?>

<div class="flex mt-8">
  <div class="card card-side justify-center mx-4 flex-[1]">
    <div class="card-body mx-4">
      <div class=" p-8 bg-base-100 shadow-xl rounded-2xl">
      <h2 class="text-center text-2xl font-bold" >Levels</h2>
      <?php
       foreach ($levelData as $level){ 
        $groupdata = fetch('SELECT * FROM LevelGroups WHERE GroupID=?', [
            'type' => 'i',
            'value' => $level['GroupID'],
          ]);
      ?>
      <h2 class="card-title"> <?php echo $level['LevelName'] ?> </h2>
      <p class="card-title" ><?php echo $groupdata['GroupName'] ?></p>
      <div class="card-actions justify-between items-center">
        <p>Group  <?php echo $groupdata['GroupID'] ?></p>
        <div class="flex flex-row gap-2">
          <a href="/admin/level/change" class="btn btn-primary">change</a>
         
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  </div>
  <div class="card card-side justify-center mx-4 flex-[1]">
    <div class="card-body mx-4  ">
    <div class=" p-8 bg-base-100 shadow-xl rounded-2xl items-center">
    <h2 class="text-center text-2xl font-bold" >Groups</h2>
      <?php
       foreach ($groupData as $group){    ?>
      <div>
        <h2 class="card-title"> <?php echo $group['GroupName'] ?> </h2>
        <div class="card-actions justify-between items-center">
        <img src="/public/img/<?php echo $group['foto'] ?>" alt="Badge" class="w-12 h-12 mr-12">
          <p>Group  <?php echo $group['GroupID'] ?></p>
          <div class="flex flex-row gap-2">
            <a href="" class="btn btn-primary">change</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

