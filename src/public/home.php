<?php
/*<div>
  HELLO FROM HOME.
  ik hoop dat dit helpt met de verwarring
</div>*/

?>
    <section class="hero container max-w-screen-lg mx-auto text-center pb-10 p-60">
      <div class="">
        <!-- <img src="public/img/UnderConstruction.png" alt="under Construction" width="600" height="300" /> -->


        <!-- begin music -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"
    />
    <link rel="stylesheet" href="styleMusic.css" />



    <div class="music-container" id="music-container">
      <div class="music-info">
        <h4 id="title"></h4>
        <div class="progress-container" id="progress-container">
          <div class="progress" id="progress"></div>
        </div>
      </div>

      <audio src="/public/Music/ukulele.mp3" id="audio"></audio>

      <div class="img-container">
        <img src="/public/images/ukulele.jpg" alt="music-cover" id="cover" />
      </div>
      <div class="navigation">
        <button id="prev" class="action-btn">
          <i class="fas fa-backward"></i>
        </button>
        <button id="play" class="action-btn action-btn-big">
          <i class="fas fa-play"></i>
        </button>
        <button id="next" class="action-btn">
          <i class="fas fa-forward"></i>
        </button>
      </div>
    </div>
    <script src="scriptMusic.js"></script>

    <!-- einde music -->
      </div>
  </section>