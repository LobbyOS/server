<?php
\Response::setTitle("Download");
?>
<div class="contents">
  <h1>Download</h1>
	<p>Lobby can be installed in many ways for different platforms.</p>
  <p>If you already have a Web Server Installed, <a href="#direct" onclick="$('.contents .tab:last a').click()">do this</a>. Or you can use the <b>Standalone</b> packages.</p>
  <ul class="tabs">
    <li class="tab"><a href="#windows">Windows</a></li>
    <li class="tab"><a href="#linux">Linux</a></li>
    <li class="tab"><a href="#mac">Mac</a></li>
    <li class="tab"><a href="#direct">Apache Server</a></li>
  </ul>
  <div id="windows">
    <h2>Windows</h2>
    <p>Download the Zip file and extract the "Lobby" folder inside it to a location of your choice.</p>
    <p>Run the "Lobby.exe" file in the folder to open Lobby</p>
    <a class="btn blue" href="<?php L_URL;?>/api/lobby/download/windows" style="display: table;font-size: 18px;">Download Zip<font size='1' style='display:block;margin-top: -10px;'>Windows 7, Windows 8, Windows 10</font></a>
    <p><a href="/docs/quick/windows" class="btn">How To Install ?</a></p>
  </div>
  <div id="linux">
    <h2>Linux</h2>
    <p>Download the <b>Lobby-Linux.zip</b> file and extract the folder inside the Zip file to anywhere you like.</p>
    <a class="btn red" href="<?php L_URL;?>/api/lobby/download/linux" style="display: table;font-size: 18px;">Download Lobby-Linux.zip<font size='1' style='display:block;margin-top: -10px;'>Ubuntu, Linux Mint, openSUSE, Fedora, CentOS, ArchLinux, ElementaryOS etc.</font></a>
    <p>To run, just open the Lobby file inside the folder you extracted.</p>
    <p><a href="/docs/quick/linux" class="btn">Further Information</a></p>
  </div>
  <div id="mac">
    <h2>Mac</h2>
    <p>Lobby hasn't been tested out in Mac. But, theoretically the Linux version should work in it.</p>
    <p><a href="/docs/quick/linux" class="btn orange">Lobby Standalone For Linux</a></p>
  </div>
  <div id="direct">
    <h2>Apache Server</h2>
    <p>If you have an Apache server installed, then download this .zip file.</p>
    <ul>
      <li>Create a folder named "lobby" in your server's document root</li>
      <li>Open the Zip file and extract the contents of it to this newly created folder ("lobby")</li>
      <li>Access the folder through your web browser.</li>
      <li><?php echo \Lobby::l("/docs/quick#section-configuration", "Install Lobby");?></li>
    </ul>
    <p>
      If you already have localhost set up and just want to download Lobby, click the button below :
      <a style='display: table;margin: 20px auto;font-size: 16px;padding: 5px 20px;' class='btn green' href="/api/lobby/download/latest">Download Lobby<font size='1' style='display:block;margin-top: -10px;'>Zip, 2.9 MB</font></a>
    </p>
  </div>
</div>
<?php
require_once $this->dir . "/src/inc/views/track.php";
