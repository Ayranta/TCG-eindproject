<?php 
$levelData=fetchSingle('SELECT * From PlayerLevels');
var_dump($levelData);
$groupData = fetchSingle('SELECT * FROM LevelGroups');
var_dump($groupData);

?>


<h1 class="md:text-center text-4xl font-bold mb-8">Levels</h1>

<div class ="flex">
<div class="card card-side justify-centre mx-4  flex-[1]">

    <div class="card-body mx-4 bg-base-100 shadow-xl rounded-2xl">
    <a href = "/user/friendrequest"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
    </svg></a>
      <?php
       foreach ($levelData as $data){ 

        $groupdata=fetch('SELECT * From LevelGroups Where GroupID=?', [
            'type' => 'i',
            'value' => $data['GroupID'],
          ]);
         
        ?>
      <h2 class="card-title"> <?php echo $data['LevelName'] ?> </h2>
      <p class="card-title" ><?php echo $groupdata['GroupName'] ?></p>
      <div class="card-actions justify-between items-center">
      <p>Group  <?php echo $groupdata['GroupID'] ?></p>
    
        <div class="flex flex-row gap-2">
          <a href="" class="btn btn-primary">trade</a>
          <a href="/user/friends/delete?friendid=<?php echo $vriend['id'] ?>"><button class="btn btn-circle btn-outline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
         </button></a>
        </div>
      </div>
      <?php } ?>
    </div>

  </div>
  <div class="card card-side justify-centre mx-4  flex-[1]">


  <div class="card-body mx-4 bg-base-100 shadow-xl rounded-2xl ">
    <a href = "/user/friendrequest"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
    </svg></a>
      <?php
       foreach ($groupData as $data){ 

        $groupdata=fetch('SELECT * From LevelGroups Where GroupID=?', [
            'type' => 'i',
            'value' => $data[''],
          ]);
        ?>
      <h2 class="card-title"> <?php echo $data['GroupName'] ?> </h2>
      <div class="card-actions justify-between items-center">
      <p>Group  <?php echo $data['GroupID'] ?></p>
        <div class="flex flex-row gap-2">
          <a href="" class="btn btn-primary">trade</a>
          <a href="/user/friends/delete?friendid=<?php echo $vriend['id'] ?>"><button class="btn btn-circle btn-outline">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
         </button></a>
        </div>
      </div>
      <?php } ?>
    </div>
        </div>