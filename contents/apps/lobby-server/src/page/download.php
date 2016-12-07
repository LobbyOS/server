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
    <li class="tab"><a href="#mac">macOS</a></li>
    <li class="tab"><a href="#direct">Server Version</a></li>
  </ul>
  <div id="windows">
    <h2>Windows</h2>
    <p>Download the Zip file and extract the "Lobby" folder inside it to a location of your choice.</p>
    <center>
      <a class="btn blue" href="<?php L_URL;?>/api/lobby/download/windows" style="display: inline-table;font-size: 18px;">Download 32-bit<font size='1' style='display:block;margin-top: -10px;'>10MB - Windows 7, 8, 10</font></a>
      <a class="btn red" href="<?php L_URL;?>/api/lobby/download/windows64" style="display: inline-table;font-size: 18px;">Download 64-bit<font size='1' style='display:block;margin-top: -10px;'>11MB - Windows 7, 8, 10</font></a>
    </center>
    <p>You may want to <b>disable your antivirus software temporarily</b> as some antivirus softwares detect Lobby falsely as a virus.</p>
    <p>Run the "Lobby.exe" or "Lobby64.exe" file in the extracted folder to open Lobby</p>
    <p><a href="/docs/quick/windows" class="btn">How To Install ?</a></p>
  </div>
  <div id="linux">
    <h2>Linux</h2>
    <p>Download the <b>Lobby-Linux.zip</b> file and extract the folder inside the Zip file to anywhere you like.</p>
    <center>
      <a class="btn red" href="<?php L_URL;?>/api/lobby/download/linux" style="display: table;font-size: 18px;">Download Lobby-Linux.zip<font size='1' style='display:block;margin-top: -10px;'>Ubuntu, Linux Mint, openSUSE, Fedora, CentOS, ArchLinux, ElementaryOS etc.</font></a>
    </center>
    <p>To run, just open the Lobby file inside the folder you extracted.</p>
    <p><a href="/docs/quick/linux" class="btn">Further Information</a></p>
  </div>
  <div id="mac">
    <h2>Mac</h2>
    <p>A Lobby Standalone version for Mac hasn't been devloped <b>yet</b>. Meanwhile you can run Lobby in macOS on a web server.</p>
    <p><a href="/docs/quick/mac" class="btn orange">Install Lobby In macOS</a></p>
  </div>
  <div id="direct">
    <h2>Apache Server</h2>
    <p>If you have an Apache server installed, then download this .zip file.</p>
    <ul class="collection">
      <li class="collection-item">Create a folder named "lobby" in your server's document root</li>
      <li class="collection-item">Open the Zip file and extract the contents of it to this newly created folder ("lobby")</li>
      <li class="collection-item">Access the folder through your web browser.</li>
      <li class="collection-item"><?php echo \Lobby::l("/docs/quick#configuration", "Install Lobby");?></li>
    </ul>
    <p>
      If you already have localhost set up and just want to download Lobby, click the button below :
      <a style='display: table;margin: 20px auto;font-size: 16px;padding: 5px 20px;' class='btn green' href="/api/lobby/download/latest">Download Lobby<font size='1' style='display:block;margin-top: -10px;'>Zip, 2.9 MB</font></a>
    </p>
  </div>
</div>
<?php
require_once $this->dir . "/src/inc/views/track.php";
