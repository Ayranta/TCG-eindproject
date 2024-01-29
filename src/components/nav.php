
<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/src/public/lang.php';
?>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
<?php
$user = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$yourfriendrequest = false;
if ($user) {

  // check for theme
  $change_theme = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $user]);

  $data = fetch('SELECT * FROM tblgebruikers WHERE gebruikerid = ?', [
    'type' => 'i',
    'value' => $userid,
  ]);
  $theme = ($change_theme["theme"] === 'dark') ? 'light' : 'dark';
  $_SESSION['profielfoto'] = $change_theme['profielfoto'];

  //look for a friendrequest
  $friendrequestData = fetchSingle('SELECT * From tblfriend_request Where receiverid = ? ' ,[
    'type' => 'i',
    'value' => $userid,
  ]);
  

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


?>

<div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li>
          <a>Parent</a>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            
          </ul>
        </li>
        <li><a>Item 3</a></li>
        
      </ul>
    </div>
    <a href="/" class="btn btn-ghost normal-case text-xl"><?=Vertalen('Trading Card Game')?></a>
  </div>

  



  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      
      <li tabindex="0">
        <details>
          <summary>talen</summary>
          <ul class="p-2">
            <li><a href="/?lang=en">English</a></li>
            <li><a href="/?lang=nl">Nederlands</a></li>
            <li><a href="/?lang=fr">Français</a></li>
            <li><a href="/?lang=zh">中文</a></li>
          </ul>
        </details>
      </li>
      <?php if(isset($_SESSION["admin"])){
    if($_SESSION["admin"] === 1){
      ?>
      <li tabindex="0">
      <details>
          <summary><?=Vertalen('Card')?></summary>
          <ul class="p-2">
            <li><a href="/admin/user/toevoegenkaart"> maak kaart</a></li>
            <li><a href="/admin/user/kaart">bekijk kaarten</a></li>
          </ul>
        </details>  
    </li>
    <?php
    }
  }?>
    </ul>
  </div>
  
  <div class="navbar-end">

    <?php if ($yourfriendrequest){ ?>
  <div class="alert shadow-lg flex mx-8" >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <div class ="flex[1.2]">
        <h3 class="font-bold">Friend request</h3>
        <div class="text-xs">from <?php echo $namesender['gebruikernaam'] ?></div>
      </div>
      <div class="flex[0.8]">
      <a href="/src/lib/user/member/acceptFriendrequest.php"><button class="btn btn-ghost">Accept</button></a>
      <a href ="/src/lib/user/member/denyFriendrequest.php"><button class="btn btn-ghost">Deny</button></a>
      </div>
    </div>
    
        <?php } ?>
        

  <?php echo isset($_SESSION['login'])
  
      ? '
      <a href="/user/friends" class="mr-2">  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
      </svg></a> 
  

      <p>'.$data['gebruikernaam'].'</p>
      <details class="dropdown dropdown-end">
      <summary class="m-1 btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
        <img src="'.$change_theme['profielfoto'].'" />
        </div>
      </summary>
      <ul class="mt-2 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
        <li><a href = "/account/logout">logout</a></li>
        <li><a href="/src/lib/user/member/change-theme.php" >Switch to ' . $theme . '</a></li>
        <li>    <a href="/account/settings/edit" class="mr-2"> settings </a> </li>
        <li>
        <details class="dropdown dropdown-left">
          <summary class="m-1">Admin Dashboard</summary>
          <ul class="mr-4 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
            
            <li><a href="/dashboard/users">gebruikers</a></li>
            <li><a href="/dashboard/categorieen">categorieen</a></li>
            
            
      </ul>
    </details>
        ':
      '<a href="/account/login" class="btn">Login</a>'; ?>
  </div>
</div>
