
<?php 
if(!isset($_SESSION['login'])){
  header('location: /');
}
$userid=$_SESSION['login'];

$vrienden=fetchSingle('SELECT * From tblvrienden Where gebruikerId = ? OR vriendenmetId = ?',['type'=>'i', 'value'=>$userid],['type'=>'i', 'value'=>$userid]);
$GroupLevelofPlayer=fetch('SELECT * From levelgroups Where GroupID = ?',[
  'type' => 'i',
  'value' => $levelofPlayer['GroupID'],
]);
$change_theme = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $user]);

?>


<h1 class="md:text-center text-4xl font-bold mb-8"><?= Vertalen('Your Friends')?></h1>


<div class="card card-side bg-base-100 shadow-xl justify-centre mx-96  ">

    <div class="card-body">
    <?php
    if (isset($_GET['succesfullyadded'])){ 
      echo'
      <div role="alert" class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
         <span>friendrequest has been send!</span>
      </div>';
    }
       if (isset($_GET['friendrequestAlreadyExists'])){ 
      echo'
      <div role="alert" class="alert alert-info">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>a friend request has allready been send</span>
       </div>';
    }
    if (isset($_GET['userdoesntexist'])){ 
      echo'
      <div role="alert" class="alert alert-info">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>User doesnt exist</span>
       </div>';
    }
    if (isset($_GET['friendAlreadyExists'])){ 
      echo'
      <div role="alert" class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>your friend allready exists.</span>
       </div>';
    }
    ?>
    <a href = "/user/friendrequest"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
    </svg></a>
  
      <?php foreach ($vrienden as $vriend){ 

        if($vriend['gebruikerId']==$userid){
            $myfriend=$vriend['vriendenmetId'];
        }else{
          $myfriend=$vriend['gebruikerId'];
        }
      
        $gebruiker = fetch('SELECT * From tblgebruikers Where gebruikerId = ?',['type'=>'i', 'value'=>$myfriend]);
        $gebruikerProfile = fetch('SELECT * FROM tblgebruiker_profile WHERE userid =?',['type'=>'i', 'value'=>$myfriend]);
        
        ?>
      <h2 class="card-title"> <?php echo $gebruiker['gebruikernaam'] ?> </h2>
     
      <p>Level : <?php echo $gebruikerProfile['Level'] ?></p>
      <div class="card-actions justify-between items-center">
    
      <p>last online : A week ago</p>
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