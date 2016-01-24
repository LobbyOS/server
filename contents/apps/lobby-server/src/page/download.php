<?php
\Lobby::setTitle("Download");
?>
<div class="contents">
  <h1>Download & Install</h1>
	<p>
		Here is a one page instructions on how to download & install Lobby.
		<h2>Requirements</h2>
		<ul>
			<li>Windows / Ubuntu / Mac OSX / LinuxMint / Debian</li>
      <li>A <a href="http://www.google.com/search?q=install+localhost+web+server+with+php+mysql" target="_blank">Localhost Web Server</a> that has :
        <ul>
			    <li>Apache Web Server with <strong>rewrite</strong> module enabled</li>
			    <li>MySQL version <span title="more than or equal to">&gt;=</span> 5.0</li>
			    <li>PHP version <span title="more than or equal to">&gt;=</span> 5.3</li>
        </ul>
      </li>
			<li>PHP Extensions :
				<ul>
					<li>PDO</li>
          <li>cURL</li>
					<li>JSON</li>
          <li>Zip</li>
				</ul>
			</li>
      <li>PHP Settings :
        <ul>
          <li>Enable PHP Output Buffering</li>
        </ul>
      </li>
		</ul>
	</p>
	<h2>Auto Install</h2>
  <p>There are 2 ways to auto install Lobby :</p>
  <p>One is to download a .deb file and install it :</p>
  <a class="button red" href="<?php L_URL;?>/api/lobby/download/deb">Download (.deb)</a>
	<p>
		Another way is to run a <b>bash script</b> on the directory where you want Lobby.
	</p>
  <p>
    It works on all Linux systems that has the <a href='https://en.wikipedia.org/wiki/Advanced_Packaging_Tool' target='_blank'>Advanced Packaging Tools (APT)</a>
  </p>
	<ul>
		<li><?php echo \Lobby::l("/api/lobby/download/script", "Download Script", "class='button green'");?></li>
		<li>Copy the script to the folder where you want to install Lobby. Recommended : <b>/var/www/html</b></li>
		<li>Open a terminal on the folder and run the script with root.
			<pre><code>sudo bash ./lobby-install.sh</code></pre>
		</li>
		<li>The installer will ask some questions and the downloading and installation will be automatically done by the script.<br/>Note that the downloading and extraction is done to the folder where the script is located.</li>
    <li>Open <a href='http://localhost/lobby' target='_blank'>lobby location</a> in your web browser</li>
	</ul>
	<h2>Manual Install</h2>
	<p>
		If you want to install manually, see <?php echo \Lobby::l("/docs/quick", "this")?>.<br/>
	</p>
  <h2>Direct Download</h2>
  <p>
    If you already have localhost set up and just want to download Lobby, click the button below :
    <a style='display: table;margin: 20px auto;font-size: 16px;padding: 5px 20px;' class='button green' href="/api/lobby/download/latest">Download Lobby<font size='1' style='display:block;margin-top: -10px;'>Zip, 2.4 MB</font></a>
  </p>
</div>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
