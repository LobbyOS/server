<?php include "../load.php";?>
<html>
  <head>
    <?php \Lobby::head("App Manager");?>
  </head>
  <body>
    <?php
    \Lobby::doHook("admin.body.begin");
    include "$docRoot/admin/sidebar.php";
    ?>
    <div class="workspace">
      <div class="content">
        <h1>Apps</h1>
        <p>Manage installed apps. You can find and install more Apps from <a href="<?php echo L_URL;?>/admin/lobby-store.php">Lobby Store</a>.</p>
        <?php
        if(isset($_GET['action']) && isset($_GET['app']) && H::csrf()){
          $action = $_GET['action'];
          $app = $_GET['app'];
          $App = new \Lobby\Apps($app);
          if( !$App->exists ){
            ser("Error", "I checked all over, but App does not Exist");
          }
          if($action == "remove"){
        ?>
            <h2>Confirm</h2>
            <p>Are you sure you want to remove the app <b><?php echo $app;?></b> ?</p>
            <div clear></div>
            <a class="button green" href="<?php echo L_URL ."/admin/install-app.php?action=remove&id={$app}&".H::csrf("g");?>">Yes, I'm Sure</a>
            <a class="button red" href="<?php echo L_URL ."/admin/apps.php";?>">No, I'm Not</a>
        <?php
            exit;
          }
        }
        $Apps = \Lobby\Apps::getEnabledApps();
    
        if(count($Apps) == 0){
          ser("No Enabled Apps", "Lobby didn't find any apps that has been enabled", false);
        }
        if(count($Apps) != 0){
        ?>
          <table style="width: 100%;margin-top:5px">
            <thead>
              <tr>
                <td>Name</td>
                <td>Version</td>
                <td>Description</td>
                <td>Actions</td>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($Apps as $app => $null){
                $App = new \Lobby\Apps($app);
                $data = $App->info;
                $appImage = !isset($data['image']) ? L_URL . "/includes/lib/core/Img/blank.png" : $data['image'];
              ?>
                <tr>
                  <td>
                    <a href="<?php echo \Lobby::u("/admin/app/$app");?>"><?php echo $data['name'];?></a>
                  </td>
                  <td><?php echo $data['version'];?></td>
                  <td><?php echo $data['short_description'];?></td>
                  <td style="//text-align:center;">
                    <a class="button red" href="?action=remove&app=<?php echo $app . H::csrf('g');?>">Remove</a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        <?php
        }
        ?>
      </div>
    </div>
  </body>
</html>
