<?php
$this->addStyle("main.css");
\Lobby::setTitle("A Localhost/Web Operating System");
?>
<div class="section">
  <div class="contents">
    <center>
      <a href='//lobby.subinsb.com'><img src='<?php echo APP_SRC . "/src/image/logo.png";?>' /></a>
      <p class='info'>Lobby is an Open Source multi-platform <b>localhost Operating System (LOS)</b><cl></cl>Lobby runs on any platform Linux, Windows, Mac, you name it<cl/>All it requires is a localhost server</p>
    </center>
  </div>
</div>
<div class="section">
  <div class="contents">
    <h1 style='font-size: 4em;margin-top:0;'><a href="/apps" style="color: white;">Lobby Store</a></h1>
    <p>Lobby Store is a collection of apps currently progressing with the help from developers all over the world.</p>
    <div clear>
      <a href="/apps/diary" class='app'>
        <img src="//googledrive.com/host/0B2VjYaTkCpiQdTl4TldwMmVqdU0/logo.png" />
        <div class='app_name'>Diary</div>
      </a>
      <a href="/apps/millionaire" class='app'>
        <img src="//googledrive.com/host/0B2VjYaTkCpiQflZzRE52WFRiSEpqNmJVQWNTQndJY0M3Y29XUmRFcGRnWm9xcFUyU1lVNkE/logo.png" />
        <div class='app_name'>Who Wants To Be A Millionaire</div>
      </a>
    </div>
  </div>
</div>
<div class="section">
  <div class="contents">
    <h1 style='font-size: 4em;margin-top:0;'>One App For All</h1>
    <p>Developers will only have to create a single web app for all platforms.</p>
    <p>Make your life easy.</p>
    <div clear>
      <a class='button green' href='/docs/dev'>Developer Docs</a>
      <a class='button red' href='/docs/dev/create-app'>Create Apps</a>
    </div>
  </div>
</div>
<div class="section">
  <div class="contents" style="padding: 20px 0;">
    <h1 style='font-size: 4em;margin-top:0;'>Open Source</h1>
    <img src='<?php echo APP_SRC;?>/src/image/code.png' />
    <p>Lobby is completely Open Source. Licensed under the <a href='http://www.apache.org/licenses/LICENSE-2.0' target='_blank'>Apache License</a>.</p>
    <div clear>
      <a class='button orange' href='https://github.com/subins2000/lobby'>GitHub Repository</a><br/>
    </div>
  </div>
</div>
<div class="section">
  <div class="contents" style="padding: 20px 0;">
    <h1 style='font-size: 4em;margin-top:0;'>Download</h1>
    <div clear>
      <a class='button pink' href='/api/download/lobby/script' clear>Download Bash Script</a>
      <a class='button green' href='/api/download/lobby/latest' clear>Direct Download (.zip)</a>
      <a class='button blue' href='/docs/quick' clear>Manual Install</a>
      <a class='button' href='/web-readme' clear>Web Version</a>
    </div>
    <p style='margin-top: 20px;'>&copy; Copyleft <a href="https://github.com/orgs/LobbyOS/people" target="_blank">Lobby Team</a> 2014 - <?php echo date("Y");?></p>
  </div>
</div>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
