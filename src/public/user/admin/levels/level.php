<?php 
$levelData=fetchSingle('SELECT * From playerlevels');

$groupData = fetchSingle('SELECT * FROM levelgroups');


?>

<div class="flex mt-8">
  <div class="card card-side justify-center mx-4 flex-[1]">
    <div class="card-body mx-4">
      <div class=" p-8 bg-base-100 shadow-xl rounded-2xl">
      <h2 class="text-center text-2xl font-bold" >Levels</h2>
      <?php
       foreach ($levelData as $level){ 
        $groupdata = fetch('SELECT * FROM levelgroups WHERE GroupID=?', [
            'type' => 'i',
            'value' => $level['GroupID'],
          ]);
      ?>
      <h2 class="card-title"> <?php echo $level['LevelName'] ?> -- <?php echo $groupdata['GroupName'] ?></h2>
      <p class="card-title" ></p>
      <div class="card-actions justify-between items-center">
      <p><?php echo $level['ExpirienceRequired'] ?> exp</p>
        <p>Group  <?php echo $level['GroupID'] ?></p>
        <div class="flex flex-row gap-2">
          <a href="/admin/level/change?levelId=<?php echo $level['LevelID'] ?>" class="btn btn-primary">change</a>
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
        <div class="flex">
          <img src="/public/img/<?php echo $group['foto'] ?>" alt="Badge" class="w-12 h-12 mr-12">
            <p>Group  <?php echo $group['GroupID'] ?></p>
          
        </div>
          <div class="flex flex-row gap-2">
          <a href="/admin/group/change?groupId=<?php echo $group['GroupID'] ?>" class="btn btn-primary">change</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

