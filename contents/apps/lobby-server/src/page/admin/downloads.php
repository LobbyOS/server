<?php
$this->setTitle("Download");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php
  $sql = \Lobby\DB::$dbh->query("SELECT * FROM `lobby` WHERE `key_name` = 'downloads'");
  var_dump($sql->fetch());
  ?>
</div>
