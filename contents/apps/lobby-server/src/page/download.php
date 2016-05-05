<?php
\Lobby::setTitle("Download");
?>
<div class="contents">
  <h1>Download & Install</h1>
	<p>Lobby can be installed in many ways for different platforms.</p>
  <p>If you already have a Web Server Installed, <a href="#direct-install">do this</a>. Or you can use the installers for Windows & Ubuntu (Debian variants)</p>
  
  <h2>Windows</h2>
  <p>Download the ".msi" file and install it.</p>
  <a class="btn blue" href="<?php L_URL;?>/api/lobby/download/msi" style="display: table;font-size: 18px;">Download .msi<font size='1' style='display:block;margin-top: -10px;'>Windows 7, Windows 8, Windows 10</font></a>
  <p><a href="/docs/quick/windows" class="btn">How To Install ?</a></p>
  
	<h2>Linux</h2>
  <p>Download the <b>Lobby-Linux.zip</b> file and extract the folder inside the Zip file to anywhere you like.</p>
  <a class="btn red" href="<?php L_URL;?>/api/lobby/download/linux" style="display: table;font-size: 18px;">Download Lobby-Linux.zip<font size='1' style='display:block;margin-top: -10px;'>Ubuntu, Linux Mint, openSUSE, Fedora, CentOS, ArchLinux, ElementaryOS etc.</font></a>
  <p>To run, just open Lobby file inside the folder you extracted.</p>
  
	<h2 id="direct-install">Manual Install</h2>
  <p>Mac and other platform users will have to manually install Lobby.</p>
	<p>If you want to manually install Lobby, see <?php echo \Lobby::l("/docs/quick", "QuickStart");?>.<br/></p>
  <p>
    If you already have localhost set up and just want to download Lobby, click the button below :
    <a style='display: table;margin: 20px auto;font-size: 16px;padding: 5px 20px;' class='btn green' href="/api/lobby/download/latest">Download Lobby<font size='1' style='display:block;margin-top: -10px;'>Zip, 2.4 MB</font></a>
  </p>
</div>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
