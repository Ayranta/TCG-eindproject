<?php
/*<div>
  HELLO FROM HOME.
  ik hoop dat dit helpt met de verwarring
</div>*/


//var_dump($arena);



if(isset($_SESSION['login'])){

  $arena = fetch('SELECT * FROM tblgebruiker_profile WHERE userid = ?' ,[
    'type' => 'i',
    'value' => $userid,
  ]);

  $levelofPlayer=fetch('SELECT * From playerlevels Where LevelID = ? ',[
    'type' => 'i',
   
    'value' => $arena['Level'],
  ]);



if($levelofPlayer['GroupID'] == 1){

    ?>
  <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-16">
    <div class="">
      <a href=/levels/randomizer>
      <img src="public\img\arenaIMG\arena_barbarian.png" alt="Arena1" width="600" height="300" />
    </div>
</section>
<?php


}elseif($levelofPlayer['GroupID'] == 2){
  ?>
  <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-16">
    <div class="">
    <a href=/levels/randomizer>
      <img src="public\img\arenaIMG\arena_bone.png" alt="Arena2" width="600" height="300" />
    </div>
</section>
<?php
}elseif($levelofPlayer['GroupID'] == 3){
 
  ?>
  <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-60">
    <div class="">
    <a href=/levels/randomizer>
      <img src="public\img\arenaIMG\arena6.png" alt="Arena3" width="600" height="300" />
    </div>
</section>
<?php
}elseif($levelofPlayer['GroupID'] == 4){
  ?>
  <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-60">
    <div class="">
    <a href=/levels/randomizer>
      <img src="public\img\arenaIMG\arena_spell.png" alt="Arena4" width="600" height="300" />
    </div>
</section>
<?php
}elseif($levelofPlayer['GroupID'] == 5){
  ?>
  <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-60">
    <div class="">
    <a href=/levels/randomizer>
      <img src="public\img\arenaIMG\Legendary_Arena.png" alt="Last Arena" width="600" height="300" />
    </div>
</section>
<?php
}else{
?>
    <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-60">
      <div class="">
        <img src="public/img/UnderConstruction.png" alt="under Construction" width="600" height="300" />
      </div>
  </section>
<?php
}
}


