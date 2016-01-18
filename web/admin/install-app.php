<?php
require "../load.php";?>
<!DOCTYPE html>
<html>
  <head>
     <?php \Lobby::head("Install App");?>
  </head>
  <body>
    <?php
    \Lobby::doHook("admin.body.begin");
    ?>
    <div class="workspace">
      <div class="contents">
        <?php
        if(H::input("id") == null){
          ser("Error", "No App is mentioned. Install Apps from <a href='lobby-store.php'>Lobby Store</a>");
        }
        $id = htmlspecialchars(H::input("id"));
        if(H::input("action") == "remove" && H::csrf()){
          $App = new \Lobby\Apps($_GET['id']);
          if($App->disableApp()){
            sss("Removed", "The App <b>{$id}</b> was successfully removed.");
          }else{
            sss("Error", "The App <b>{$id}</b> was not found");
          }
        }
        $id = H::input("id");
        if($id != null && H::input("action") == null && H::csrf()){
        ?>
          <h1>Install App</h1>
          <iframe src="<?php echo L_URL . "/admin/download.php?type=app&id={$id}". H::csrf("g");?>" style="border: 0;width: 100%;height: 200px;"></iframe>
        <?php
        }
        ?>
      </div>
    <div>
  </body>
</html>
