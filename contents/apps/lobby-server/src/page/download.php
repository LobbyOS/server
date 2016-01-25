<?php
\Lobby::setTitle("Download");
?>
<div class="contents">
  <h1>Download & Install</h1>
	<p>There are many ways how you can download install Lobby. We recommend the use of Automatic Installer as it installs the dependencies, download and install Lobby easily.</p>
	<h2>Automatic</h2>
  <p>Download a .deb file and install it :</p>
  <a class="button red" href="<?php L_URL;?>/api/lobby/download/deb" style="margin: 0 auto;display: table;font-size: 18px;">Download .deb<font size='1' style='display:block;margin-top: -10px;'>Debian, Ubuntu, Linux Mint, elementaryOS...</font></a>
	<h2>Manual Install</h2>
  <p>Windows, Mac and other platform users must use manual install for installing Lobby.</p>
	<p>If you want to manually install Lobby, see <?php echo \Lobby::l("/docs/quick", "QuickStart");?>.<br/></p>
  <h2>Direct Download</h2>
  <p>
    If you already have localhost set up and just want to download Lobby, click the button below :
    <a style='display: table;margin: 20px auto;font-size: 16px;padding: 5px 20px;' class='button green' href="/api/lobby/download/latest">Download Lobby<font size='1' style='display:block;margin-top: -10px;'>Zip, 2.4 MB</font></a>
  </p>
</div>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
