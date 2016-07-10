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
          <img src="<?php echo $this->srcURL;?>/src/image/screenshots/lobby-store-app.png" alt="">
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
        <li><a href="#lobby-store">Lobby Store</a></li>
        <li>Auto update Lobby & Apps when a new version comes out</li>
        <li>Lightweight - Lobby was created from scratch with performance in mind</li>
        <li>Open Source (Apache License)</li>
        <li>Lobby has a set of API which helps devs write shorter and better code</li>
        <li>Modules - helps Lobby to be customized as you like</li>
        <li>Develop rich web sites (<a href="https://lobby.subinsb.com">This site</a> runs on Lobby)</li>
      </ul>
    </div>
  </div>
</section>
<section id="lobby-store" class="even-section">
  <div class="container">
    <div class="row" style="text-align: left;">
      <h2 style='font-size: 4em;'><a href="/apps" style="color: white;">Lobby Store</a></h2>
      <p>Lobby Store is a repository of apps for you to install. Find great apps and <a href="<?php $this->u("/docs/dev/app/publish");?>">publish your apps</a> for others to use.</p>
      <img src="<?php echo $this->srcURL;?>/src/image/screenshots/lobby-store.png" />
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
      <a class='platform' id='github' href='https://github.com/LobbyOS/lobby' title='GitHub'></a>
      <a class='platform' id='facebook' href='https://www.facebook.com/groups/LobbyOS' title='Support & Help'></a>
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
