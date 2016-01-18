<?php
$this->setTitle("New App");
?>
<div class="contents">
  <h1>Add App</h1>
  <?php
  $app_info = array(
    "id" => H::input("app_id"),
    "name" => H::input("app_name"),
    "image" => H::input("app_image"),
    "git_url" => H::input("app_download"),
    "short_description" => H::input("app_short_description"),
    "description" => H::input("app_description"),
    "category" => H::input("app_category"),
    "sub_category" => H::input("app_sub_category"),
    "version" => H::input("app_version"),
    "page" => H::input("app_page"),
    "author_id" => H::input("author_id")
  );
  
  if(isset($_POST['app_id']) && array_search(null, $app_info) === false && H::csrf()){
    $apps_sql = \Lobby\DB::$dbh->prepare("SELECT COUNT(1) FROM `apps` WHERE `id` = ?");
    $apps_sql->execute(array($app_info['id']));
    
    if($apps_sql->fetchColumn() != 0){
      ser("App Exists", "Hmmm... Looks like the App ID you submitted already exists either on App Center Or in the App Queue. " . \Lobby::l("/apps/{$app_info['id']}", "See Existing App"));
    }else{
      $app_info['image'] = $app_info['image'] == "null" ? "" : $app_info['image'];
      $lobby_web = isset($_POST['app_lobby_web']) ? 1 : 0;
      
      $sql = \Lobby\DB::$dbh->prepare("INSERT INTO `apps` (`id`, `name`, `version`, `image`, `git_url`, `description`, `short_description`, `category`, `sub_category`, `app_page`, `author`, `lobby_web`, `updated`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW());");
      
      $sql->execute(array($app_info['id'], $app_info['name'], $app_info['version'], $app_info['image'], $app_info['git_url'], $app_info['description'], $app_info['short_description'], $app_info['category'], $app_info['sub_category'], $app_info['page'], $app_info['author_id'], $lobby_web));
      
      sss("App Added", "App was added to the repository");
    }
  }
  ?>
  <form action="<?php echo \Lobby::u();?>" method="POST">
    <label>
      <span>App ID</span>
      <input type="text" name="app_id" />
    </label>
    <label>
      <span>Name</span>
      <input type="text" name="app_name" />
    </label>
    <label>
      <span>Download URL</span>
      <input type="text" name="app_download" placeholder="Google Drive" size="70" />
    </label>
    <label>
      <span>Logo</span>
      <input type="text" name="app_image" placeholder="Google Drive" size="70" />
    </label>
    <label>
      <span>Short Description</span>
      <input type="text" name="app_short_description" />
    </label>
    <label>
      <span>Description</span>
      <textarea type="text" name="app_description" rows="6"></textarea>
    </label>
    <label>
      <span>Category</span>
      <select name="app_category" id="app_category">
        <?php
        require_once L_DIR . "/includes/src/App.php";
        require_once APPS_DIR . "/lobby-server/App.php";
        $obj = new lobby_server;
        
        foreach($obj->app_categories as $value => $category){
          echo "<option value='$value'>$category</option>";
        }
        ?>
      </select>
    </label>
    <label>
      <span>Sub Category</span>
      <?php
      foreach($obj->app_sub_categories as $value => $category){
        echo "<select name='app_sub_category' id='app_sub_category_$value' class='app_sub_category'>";
          foreach($category as $sub_value => $sub_category){
            echo "<span><option value='$sub_value'>$sub_category</option></span>";
          }
        echo "</select>";
      }
      ?>
    </label>
    <label>
      <span>Version</span>
      <input type="text" name="app_version" placeholder="0.1" />
    </label>
    <label>
      <span>App Page</span>
      <input type="text" name="app_page" placeholder="http:// or https://" />
    </label>
    <label>
      <span>Author ID</span>
      <input type="number" name="author_id" placeholder="Author's user ID" />
    </label>
    <label>
      <span>Lobby Web App ?</span>
      <input type="checkbox" name="app_lobby_web" />
    </label>
    <?php H::csrf(1);?>
    <button>Submit App</button>
  </form>
  <style>
    label{
      display: block;
      margin: 10px 0px;
    }
    label span{
      display: block;
    }
  </style>
  <script>
    $(function(){
      $(".app_sub_category:not(:first)").attr("disabled", "disabled").hide();
      $("#app_category").live("change", function(){
        v = $(this).val();
        $(".app_sub_category").attr("disabled", "disabled").hide();
        $("#app_sub_category_" + v).removeAttr("disabled").show();
      });
    });
  </script>
</div>
