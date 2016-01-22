<?php
require "../load.php";
require L_DIR . "/includes/src/Update.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    \Lobby::doHook("admin.head.begin");
    \Lobby::head("Update");
    ?>
  </head>
  <body>
    <?php
    \Lobby::doHook("admin.body.begin");
    require "$docRoot/admin/inc/sidebar.php";
    ?>
    <div class="workspace">
      <div class="content">
        <h1>Update</h1>
        <a class='button' href='check-updates.php'>Check For New Releases</a>
        <?php
        $AppUpdates = json_decode(getOption("app_updates"), true);
        if(\H::input("action", "POST") == "updateApps" && H::csrf()){
          foreach($AppUpdates as $appID => $neverMindThisVariable){
            if(isset($_POST[$appID])){
              echo '<iframe src="'. L_URL . "/admin/download.php?type=app&id={$appID}". H::csrf("g") .'" style="border: 0;width: 100%;height: 200px;"></iframe>';
              unset($AppUpdates[$appID]);
            }
          }
          saveOption("app_updates", json_encode($AppUpdates));
          $AppUpdates = json_decode(getOption("app_updates"), true);
        }
        if(!isset($_GET['step']) && isset($AppUpdates) && count($AppUpdates) != 0){
        ?>
          <h2>Apps</h2>
          <p>App updates are available. Choose which apps to update from the following :</p>
          <form method="POST" clear>
            <?php H::csrf(1);?>
            <table>
              <thead>
                <tr>
                  <td style='width: 2%;'>Update ?</td>
                  <td style='width: 20%;'>App</td>
                  <td style='width: 5%;'>Current Version</td>
                  <td style='width: 20%;'>Latest Version</td>
                </tr>
              </thead>
              <?php              
              echo "<tbody>";
              foreach($AppUpdates as $appID => $latest_version){
                $App = new \Lobby\Apps($appID);
                $AppInfo = $App->info;
                echo '<tr>';
                  echo '<td><label><input style="vertical-align:top;display:inline-block;" checked="checked" type="checkbox" name="'. $appID .'" /><span></span></label></td>';
                  echo '<td><span style="vertical-align:middle;display:inline-block;margin-left:5px;">'. $AppInfo['name'] .'</span></td>';
                  echo '<td>'. $AppInfo['version'] .'</td>';
                  echo '<td>'. $latest_version .'</td>';
                echo '</tr>';
              }
              ?>
            </tbody></table>
            <input type="hidden" name="action" value="updateApps" />
            <button class="button red" clear>Update Selected Apps</button>
          </form>
        <?php
        }
        if(!\H::input("action", "POST") == "updateApps"){
        ?>
          <h2>Lobby</h2>
          <p>Lobby Web Can't Be Updated.</p>
        <?php
        }
        ?>
      </div>
    </div>
  </body>
</html>
