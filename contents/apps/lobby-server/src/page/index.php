<?php
$this->addStyle("main.css");
$this->addScript("responsiveslides.min.js");
\Lobby::setTitle("Lobby - Do More With localhost");
?>
<section id="intro">
  <div class="container">
    <div class="row">
      <a href='//lobby.subinsb.com'><img src='<?php echo APP_SRC . "/src/image/logo.png";?>' /></a>
      <p style="margin-top: 20px;">Do More With localhost</p>
      <p style="margin-top: 20px;">Lobby is a framework to run web apps. It can be attributed as a combination of <a href="https://en.wikipedia.org/wiki/Android" target="_blank" >Android</a> & <a href="https://en.wikipedia.org/wiki/WordPress" target="_blank" >WordPress</a></p>
      <p>Lobby runs in <a target="_blank" href="https://en.wikipedia.org/wiki/Localhost">localhost</a> and can be used via a browser (Chrome, Firefox)</p>
      <p>Hence Lobby is platform independent and can be installed on any localhost server</p>
      <div style="margin-top: 20px;">
        <a class="button page-scroll" href="#screenshots">Screenshots</a>
        <a class="button blue page-scroll" href="#features">Features</a>
        <a class="button page-scroll" href="#lobby-store">Lobby Store</a>
        <div style="margin-top: 10px;">
          <a class="button red page-scroll" href="#download">Download</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="screenshots" class="even-section" style="padding: 10px 0;">
  <div class="container">
    <div class="row">
      <ul class="rslides">
        <li>
          <img src="<?php echo APP_URL;?>/src/image/screenshots/dashboard.png" alt="">
          <p class="caption">The Lobby Dashboard</p>
        </li>
        <li>
          <img src="<?php echo APP_URL;?>/src/image/screenshots/app-diary.png" alt="">
          <p class="caption">The <a href="/apps/diary">Diary App</a> On Lobby</p>
        </li>
        <li>
          <img src="<?php echo APP_URL;?>/src/image/screenshots/lobby-store.png" alt="">
          <p class="caption">Installing An App is Super Easy !</p>
        </li>
      </ul>
      <script>
        lobby.load(function(){
          setTimeout(function(){
            $(".rslides").responsiveSlides({pager: true});
          }, 2000);
        });
      </script>
    </div>
  </div>
</section>
<section id="features" class="odd-section" style="padding-top: 130px;">
  <div class="container">
    <div class="row" style="text-align: left;">
      <h2>Features</h2>
      <ul>
        <li>Auto update Lobby & Apps when a new version comes out
        <li>Lightweight - Lobby was created from scratch with performance in mind</li>
        <li>Open Source & Licensed under Apache License v2</li>
        <li>Lobby has a set of API which helps devs write shorter and better code</li>
        <li>Modules - helps Lobby to be customized as you like</li>
        <li>Theming support</li>
        <li>Use as a framework for developing Web Sites (<a href="https://lobby.subinsb.com">This site</a> is an example)</li>
      </ul>
      <a class='button orange' href='https://github.com/subins2000/lobby'>GitHub Repository</a>
      <a class='button red' href='https://github.com/subins2000/lobby/issues'>Bugs, Support</a>
    </div>
  </div>
</section>
<section id="lobby-store" class="even-section" style="padding-top: 100px;">
  <div class="container">
    <div class="row" style="text-align: left;">
      <h2 style='font-size: 4em;'><a href="/apps" style="color: white;">Lobby Store</a></h2>
      <p>Lobby Store is a collection of apps currently progressing with the help of developers all over the world</p>
      <div clear>
        <a href="/apps/diary" class='app'>
          <img src="//googledrive.com/host/0B2VjYaTkCpiQdTl4TldwMmVqdU0/logo.png" />
          <div class='app_name'>Diary</div>
        </a>
        <a href="/apps/millionaire" class='app'>
          <img src="//googledrive.com/host/0B2VjYaTkCpiQflZzRE52WFRiSEpqNmJVQWNTQndJY0M3Y29XUmRFcGRnWm9xcFUyU1lVNkE/logo.png" />
          <div class='app_name'>Who Wants To Be A Millionaire</div>
        </a>
        <a href="/apps/millionaire" class='app'>
          <img src="<?php echo APP_URL;?>/api/app/anagram/logo" />
          <div class='app_name'>Anagram</div>
        </a>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="contents" style="padding: 20px 0;">
    <h1 style='font-size: 4em;margin-top:0;'><a href="/download">Download</a></h1>
    <div clear>
      <a class='button pink' href='/api/lobby/download/deb' clear>Download (.deb)</a>
      <a class='button green' href='/api/lobby/download/latest' clear>Direct Download (.zip)</a>
      <a class='button blue' href='/docs/quick' clear>Manual Install</a>
      <a class='button' href='/web-readme' clear>Web Demo</a>
    </div>
    <p style='margin-top: 50px;'>&copy; Copyleft <a href="https://github.com/orgs/LobbyOS/people" target="_blank">Lobby Team</a> 2014 - <?php echo date("Y");?></p>
  </div>
</section>
<script src="<?php echo APP_SRC;?>/src/lib/scolling-nav/js/jquery.easing.min.js"></script>
<script src="<?php echo APP_SRC;?>/src/lib/scolling-nav/js/scrolling-nav.js"></script>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
