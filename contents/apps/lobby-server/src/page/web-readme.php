<div class="contents">
  <h1>Lobby Demo</h1>
  <p>Lobby Web is only for a demo purpose.</p>
  <p>We recommend you <a href="/download">downloading Lobby</a> and installing it on your server.</p>
  <ul>
    <li>Lobby Web may not be running the latest version of Lobby</li>
    <li>There is no guarantee that all apps will work in Lobby Web</li>
    <li>Bugs are possible anywhere just like electrons in an atomic orbital</li>
  </ul>
  <a class="btn red" href="/web">PROCEED</a>
</div>
<style>
ul, li{
  list-style-type: disc !important;
}
ul{
  padding: 5px 30px;
}
</style>
<?php
\Lobby::setTitle("Web");
require_once APP_DIR . "/src/inc/views/track.php";
