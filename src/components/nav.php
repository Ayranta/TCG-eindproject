<?php 

$user = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$yourfriendrequest = false;
if ($user) {
  $change_theme = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $user]);

  $data = fetch('SELECT * FROM tblgebruikers WHERE gebruikerid = ?', [
    'type' => 'i',
    'value' => $userid,
  ]);
  $theme = ($change_theme["theme"] === 'dark') ? 'light' : 'dark';
  $_SESSION['profielfoto'] = $change_theme['profielfoto'];

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
        <li><a href="/about">About</a></li>
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
    <a href="/" class="btn btn-ghost normal-case text-xl">Trading Card Game</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="/about">About</a></li>
      <li tabindex="0">
        <details>
          <summary>talen</summary>
          <ul class="p-2">
            <li><a href="index.php?lang=en">English</a></li>
            <li><a href="index.php?lang=nl">Nederlands</a></li>
            <li><a href="index.php?lang=fr">Français</a></li>
          </ul>
        </details>
      </li>
      <li><a>Item 3</a></li>
      <?php if(isset($_SESSION["admin"])){
    if($_SESSION["admin"] === 1){
      ?>
      <li tabindex="0">
      <details>
          <summary>Kaart</summary>
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
    <a href="/account/settings/edit" class ="mr-4">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
