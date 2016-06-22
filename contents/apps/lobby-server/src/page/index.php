<?php
$this->addStyle("main.css");
$this->addScript("responsiveslides.min.js");
\Response::setTitle("A Web OS");
?>
<section id="intro">
  <div class="container">
    <div class="row">
      <a href='//lobby.subinsb.com'><img src='<?php echo $this->srcURL . "/src/image/logo.png";?>' /></a>
      <p style="margin-top: 20px;">A Web OS</p>
      <p style="margin-top: 20px;">Lobby is a framework to run web apps. It can be attributed as a combination of <a href="https://en.wikipedia.org/wiki/Android" target="_blank" >Android</a> & <a href="https://en.wikipedia.org/wiki/WordPress" target="_blank" >WordPress</a></p>
      <p>Lobby runs in <a target="_blank" href="https://en.wikipedia.org/wiki/Localhost">localhost</a> and can be used via a browser</p>
      <p>Hence Lobby can be installed on any platforms like Windows, Linux, Mac etc.</p>
      <p>Still don't understand it ? See a detailed description here :</p>
      <a href="/docs/about" class="btn indigo" target="_blank">About Lobby</a>
      <div style="margin-top: 10px;">
        <a class="btn page-scroll" href="#screenshots">Screenshots</a>
        <a class="btn blue page-scroll" href="#features">Features</a>
        <a class="btn page-scroll" href="#lobby-store">Lobby Store</a>
        <div style="margin-top: 10px;">
          <a class="btn red page-scroll" href="#download">Download</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="screenshots" class="even-section" style="padding: 80px 0 10px">
  <div class="container">
    <div class="row">
      <ul class="rslides">
        <li>
          <img src="<?php echo $this->srcURL;?>/src/image/screenshots/dashboard.png" alt="">
          <p class="caption">The Lobby Dashboard</p>
        </li>
        <li>
          <img src="<?php echo $this->srcURL;?>/src/image/screenshots/app-diary.png" alt="">
          <p class="caption">The <a href="/apps/diary">Diary App</a> On Lobby</p>
        </li>
        <li>
          <img src="<?php echo $this->srcURL;?>/src/image/screenshots/lobby-store.png" alt="">
          <p class="caption">Installing An App is Super Easy !</p>
        </li>
      </ul>
      <script>
        window.addEventListener("load", function(){
          $(".rslides").responsiveSlides({pager: true});
        });
      </script>
    </div>
  </div>
</section>
<section id="features" class="odd-section">
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
      <a class='btn orange' href='https://github.com/subins2000/lobby'>GitHub Repository</a>
      <a class='btn red' href='https://github.com/subins2000/lobby/issues'>Bugs, Support</a>
    </div>
  </div>
</section>
<section id="lobby-store" class="even-section">
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
          <img src="<?php echo $this->url;?>/api/app/anagram/logo" />
          <div class='app_name'>Anagram</div>
        </a>
      </div>
    </div>
  </div>
</section>
<section id="download">
  <div class="contents" style="padding: 20px 0;">
    <h1 style='font-size: 4em;margin-top:0;'><a href="/download">Download</a></h1>
    <div clear>
      <a class='platform linux' href='/api/lobby/download/linux' title='Download Linux Distro Supported Zip File'></a>
      <a class='platform windows' href='/api/lobby/download/windows' title='Download MSI File'></a>
      <a class='platform zip' href='/api/lobby/download/latest' title='Download Zip File'></a>
    </div>
    <div clear style='margin-top: 20px;' >
      <a class='btn' href='/download' clear>How To Install ?</a>
    </div>
    <p style='margin-top: 50px;'>&copy; Copyleft <a href="https://github.com/orgs/LobbyOS/people" target="_blank">Lobby Team</a> 2014 - <?php echo date("Y");?></p>
  </div>
</section>
<script>
$(function(){
  $('a.page-scroll').live('click', function(event) {
    var $anchor = $(this);
    $('.workspace').scrollTo($($anchor.attr('href')));
    event.preventDefault();
  });
});
</script>
<?php
require_once $this->dir . "/src/inc/views/track.php";
