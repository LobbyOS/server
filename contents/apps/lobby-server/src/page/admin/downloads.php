<?php
$this->setTitle("Download");
?>
<div class="contents">
  <h1>Lobby Admin</h1>
  <?php
  $sql = \Lobby\DB::$dbh->query("SELECT * FROM `lobby` WHERE `key_name` = 'downloads'");
  echo "<pre syle='word-wrap: break-word;white-space: pre-wrap;'><code>";
  var_dump($sql->fetch());
  echo "</code></pre>";
  ?>
  <h2>Usage</h2>
  <table>
    <thead>
      <colgroup>
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 15%;">
         <col span="2" style="width: 55%;">
         <col span="1" style="width: 15%;">
      </colgroup>
      <tr>
        <th>Lobby Version</th>
        <th>Frequency</th>
        <th>Last Accessed</th>
        <th>Public ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = \Lobby\DB::$dbh->query("SELECT * FROM `lobby_api_access`");
      while($r = $sql->fetch()){
        echo "<tr>";
          echo "<td>{$r['version']}</td>";
          echo "<td>{$r['frequency']}</td>";
          echo "<td>". date("Y-m-d H:i:s", $r['accessed']) ."</td>";
          echo "<td><div style='width: 300px;'>{$r['lid']}</div></td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>
