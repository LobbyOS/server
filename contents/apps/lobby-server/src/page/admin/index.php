<?php
$this->setTitle("Admin");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php echo \Lobby::l("/admin/app/lobby-server/new-app", "New App", "class='button green' clear");?>
  <?php echo \Lobby::l("/src/data/downloads.txt", "Download Stats", "class='button' clear target='_blank'");?>
  <?php echo \Lobby::l("/admin/adminer-4.2.1-mysql-en.php", "Database", "class='button red' clear target='_blank'");?>
</div>
