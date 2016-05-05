<?php
$this->setTitle("Admin");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php
  echo \Lobby::l("/admin/app/lobby-server/new-app", "New App", "class='btn green' clear");
  echo \Lobby::l("/admin/app/lobby-server/downloads", "Download Stats", "class='btn' clear");
  echo \Lobby::l("https://lobby-subins.rhcloud.com/phpmyadmin", "Database", "class='btn red' clear target='_blank'");
  echo \Lobby::l("/admin/app/lobby-server?clear-git-cache" . \H::csrf("g"), "Clear Git Cache", "class='btn orange' clear");
  if(isset($_GET["clear-git-cache"]) && \H::csrf()){
    \Lobby\DB::$dbh->exec("TRUNCATE TABLE `git_cache`");
    echo "<h2>cleared</h2>";
  }
  ?>
</div>
