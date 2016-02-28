<?php
\Lobby::setTitle("Download");
?>
<div class="contents">
  <h1>Download & Install</h1>
	<p>Lobby can be installed in many ways for different platforms.</p>
  <p>If you already have a Web Server Installed, <a href="#direct-install">do this</a>. Or you can use the installers for Windows & Ubuntu (Debian variants)</p>
  
	<h2>Debian Variants</h2>
  <p>Download the ".deb" file and install it by <pre><code>dpkg -i lobby.deb</code></pre></p>
  <a class="btn red" href="<?php L_URL;?>/api/lobby/download/deb" style="display: table;font-size: 18px;">Download .deb<font size='1' style='display:block;margin-top: -10px;'>Debian, Ubuntu, Linux Mint, elementaryOS...</font></a>

  <h2>Windows</h2>
  <p>Download the ".msi" file and install it.</p>
  <a class="btn blue" href="<?php L_URL;?>/api/lobby/download/msi" style="display: table;font-size: 18px;">Download .msi<font size='1' style='display:block;margin-top: -10px;'>Windows 7, Windows 8, Windows 10</font></a>
  <p><a href="/docs/quick/windows">More info on Windows installer</a></p>
  
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
