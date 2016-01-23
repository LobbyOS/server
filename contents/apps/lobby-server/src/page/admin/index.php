<?php
$this->setTitle("Admin");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php echo \Lobby::l("/admin/app/lobby-server/new-app", "New App", "class='button green' clear");?>
  <?php echo \Lobby::l("/admin/app/lobby-server/downloads", "Download Stats", "class='button' clear");?>
  <?php echo \Lobby::l("https://lobby-subins.rhcloud.com/phpmyadmin", "Database", "class='button red' clear target='_blank'");?>
</div>
