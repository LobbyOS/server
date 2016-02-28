<?php
$this->setTitle("Admin");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php echo \Lobby::l("/admin/app/lobby-server/new-app", "New App", "class='btn green' clear");?>
  <?php echo \Lobby::l("/admin/app/lobby-server/downloads", "Download Stats", "class='btn' clear");?>
  <?php echo \Lobby::l("https://lobby-subins.rhcloud.com/phpmyadmin", "Database", "class='btn red' clear target='_blank'");?>
</div>
