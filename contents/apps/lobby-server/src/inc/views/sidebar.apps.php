<div class="sidebar">
  <a href='/apps'><h1 style="text-align: center;color: white;font-size: 3rem;">Lobby Store</h1></a>
  <form id="search" action="<?php echo APP_URL . "/apps";?>">
    <input name="q" placeholder="Search..." value="<?php echo isset($q) ? $q : "";?>" />
  </form>
  <h4>Top Apps</h4>
  <ul style="margin: 0px;list-style: decimal;padding: 0 20px;">
    <?php
    $sql = \Lobby\DB::$dbh->query("SELECT `id`, `name` FROM `apps` ORDER BY `downloads` DESC LIMIT 10");
    while($r = $sql->fetch()){
      echo "<li><a href='/apps/{$r['id']}'>{$r['name']}</a></li>";
    }
    ?>
  </ul>
  <?php
  /*
  <label>
    <div style='display: inline-block;'>Rating</div>
    <select name="stars" size="7">
      <option value="5">5 Stars</option>
      <option value="4">4 Star</option>
      <option value="3">3 Sta</option>
      <option value="2">2 St</option>
      <option value="1">1 S</option>
    </select>
  </label>
  */
  ?>
</div>
