
<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/src/public/lang.php';


$user = isset($_SESSION['login']) ? $_SESSION['login'] : null;


$yourfriendrequest = false;
if ($user) {
  $profiledata = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $user]);

  $data = fetch('SELECT * FROM tblgebruikers WHERE gebruikerid = ?', [
    'type' => 'i',
    'value' => $userid,
  ]);
  $theme = ($profiledata["theme"] === 'dark') ? 'light' : 'dark';
  $_SESSION['profielfoto'] = $profiledata['profielfoto'];

  $friendrequestData = fetchSingle('SELECT * From tblfriend_request Where receiverid = ? ' ,[
    'type' => 'i',
    'value' => $userid,
  ]);

  $usertitle = fetch('SELECT * FROM tbltitels WHERE id = ?', [
    'type' => 'i',
    'value' => $profiledata['titleid'],
  ]);
  
  $admin = fetchSingle("SELECT admin FROM tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $userid]);


  foreach($friendrequestData as $data2){

    if($data2['receiverid']==$userid){
      $yourfriendrequest = true;
      $friendrequestSender=$data2['senderid'];
      break;

    }
    
  }

}
if (isset($friendrequestSender)){
$namesender = fetch('SELECT * From tblgebruikers Where gebruikerid = ?',[
  'type' => 'i',
  'value' => $friendrequestSender,
]);
}

//check the levels of the player
if(isset($user)){

  $levelofPlayer=fetch('SELECT * From playerlevels Where LevelID = ? ',[
    'type' => 'i',
   
    'value' => $profiledata['Levels'],
  ]);


  $GroupLevelofPlayer=fetch('SELECT * From levelgroups Where GroupID = ?',[
    'type' => 'i',
    'value' => $levelofPlayer['GroupID'],
  ]);
}

?>

<div class="navbar bg-base-100 z-100">
  <div class="navbar-start">

    <a href="/" class="btn btn-ghost normal-case text-xl"><?=Vertalen('Trading Card Game')?></a>

  

<audio autoplay loop>
  <source src="public\music\funny-kids_59sec-190857.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>


  </div>
  <div class="navbar-center hidden lg:flex">
<?
//midden navbar
?>
  </div>
 
 
  <div class="navbar-end">

  <?php if ($yourfriendrequest){ 
    echo'
  <div class="alert shadow-lg flex mx-8" >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <div class ="flex[1.2]">
        <h3 class="font-bold">Friend request</h3>
        <div class="text-xs">from '.$namesender['gebruikernaam'] .'</div>
      </div>
      <div class="flex[0.8]">
      <a href="/src/lib/user/member/acceptFriendrequest.php"><button class="btn btn-ghost">Accept</button></a>
      <a href ="/src/lib/user/member/denyFriendrequest.php"><button class="btn btn-ghost">Deny</button></a>
      </div>
    </div>
    
        <?php } ?>
    </div>
    ';
     } ?>
   
   <ul class="menu menu-horizontal px-1">
      
      <li tabindex="0">
        <details>
          <summary><?=Vertalen('Languages')?></summary>
          <ul class="p-2">
            <li><a href="/?lang=en">English</a></li>
            <li><a href="/?lang=nl">Nederlands</a></li>
            <li><a href="/?lang=fr">Français</a></li>
            <li><a href="/?lang=zh">中文</a></li>
          </ul>
        </details>
      </li>

      <?php if(isset($_SESSION["login"])){
      ?>
      <li tabindex="0">
      <details>
          <summary><?=Vertalen('Card')?></summary>
          <ul class="p-2">
            <?php
            if($admin[0]['admin'] === 1){
            ?>
            <li><a href="/admin/user/toevoegenkaart"><?=Vertalen('Make Card')?></a></li>
            <li><a href="/admin/user/kaart"><?=Vertalen('See cards admin')?></a></li>
            <?php
          }
            ?>
            <li><a href="/admin/user/kaartGebruiker"><?=Vertalen('See cards')?></a></li>
          </ul>
        </details>  
    </li>
    <?php
    }
  ?>
    </ul>        

  <?php echo isset($_SESSION['login'])
  
      ? '
      

      <a href = "/member/user/shop" ><i class="fa-solid fa-cart-shopping fa-xl pr-4" ></i></a>

      <div class="flex items-center justify-center mr-2">
      <div class="relative">
          <img src="/public/img/'.$GroupLevelofPlayer['foto'].'" alt="Badge" class="w-12 h-12">
          <div class="absolute top-1 left-0 w-full h-full flex items-center justify-center">
              <span class="text-white text-lg ">'.$profiledata['Levels'].'</span>
          </div>
      </div>
  </div>
  
  '.(isset($usertitle['name']) && $usertitle['name'] != 0 ? '<p class = "mr-1 font-bold">['.$usertitle['name'].']</p>' : '').'

    
      <p>'.$data['gebruikernaam'].'</p>
      <details class="dropdown dropdown-end">
      <summary class="m-1 btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
        <img src="/public/img/profilePic/'.$profiledata['profielfoto'].'" alt="foto";" " class="w-12 h-12">
        </div>
      </summary>
      <ul class="mt-2 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
        <li><a href = "/account/logout">logout</a></li>
        <li><a href="/src/lib/user/member/change-theme.php" >Switch to ' . $theme . '</a></li>
        <li>    <a href="/account/settings/edit" class="mr-2"> settings </a> </li>
        <li> <a href="/user/friends" class="mr-2">friends</a> </li>
        <li>
        <li> <a href="/account/uploadprofile" class="mr-2">profile picture</a> </li>
        <li><a href="/dashboard/title/user">your titles</a></li>
        '.( $admin[0]['admin'] ? ' <li>
        <details class="dropdown dropdown-left">
          <summary class="m-1">Admin Dashboard</summary>
          <ul class="mr-4 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
            
            <li><a href="/dashboard/users">gebruikers</a></li>
            <li><a href="/dashboard/categorieen">categorieen</a></li>
            <li><a href="/admin/level">levels</a></li>
            <li><a href="/admin/user/packs">packs</a></li>
            <li><a href="/dashboard/title">titles</a></li>
           
            
            
      </ul>
    </details>' : '').'
       
        ':
      '<a href="/account/login" class="btn">Login</a>'; ?>
  </div>
</div>


