<?php 

$user = isset($_SESSION['login']) ? $_SESSION['login'] : null;

if ($user) {
  $change_theme = fetch("SELECT * from tblgebruiker_profile Where userid = ?",
  ['type' => 'i', 'value' => $user]);

  $data = fetch('SELECT * FROM tblgebruikers WHERE gebruikerid = ?', [
    'type' => 'i',
    'value' => $userid,
  ]);

  $theme = ($change_theme["theme"] === 'dark') ? 'light' : 'dark';
  $_SESSION['profielfoto'] = $change_theme['profielfoto'];
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
          <summary>Parent</summary>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </details>
      </li>
      <li><a>Item 3</a></li>
      <li><a href = "/account/settings/edit">settings</a></li>
      
    </ul>
  </div>
  <div class="navbar-end">
  <?php if(isset($_SESSION["admin"])){
    if($_SESSION["admin"] === 1){
?>
<a href="/admin/user/toevoegenkaart">
<button class="btn btn-ghost">kaart</button>
  </a>
<?php
    }
  }?>
  <?php echo isset($_SESSION['login'])
  
      ? '
      <p>'.$data['gebruikernaam'].'</p>
      <details class="dropdown dropdown-end">
      <summary class="m-1 btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="'.$change_theme['profielfoto'].'" />
        </div>
      </summary>
      <ul class="mt-2 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
        <li><a class="justify-between">Profile</a></li>
        <li><a href = "/account/logout">logout</a></li>
        <li><a href="/src/lib/user/member/change-theme.php" >Switch to ' . $theme . '</a></li>
        <li><a href="/dashboard/products/review?seller=' . $data['gebruikernaam'] . '">Reviews</a></li>
        <li><a href="/account/favorites">Favorites</a></li>      
        <li><a href="/account/settings/edit">Settings</a></li>
        <li>
        <details class="dropdown dropdown-left">
          <summary class="m-1">Admin Dashboard</summary>
          <ul class="mr-4 p-2 shadow menu dropdown-content z-[1] bg-base-200 rounded-box w-52">
            <li><a href="">Remove cards</a></li>
            <li><a href="/dashboard/users">gebruikers</a></li>
            
            
      </ul>
    </details>
        ':
      '<a href="/account/login" class="btn">Login</a>'; ?>
  </div>
</div>
