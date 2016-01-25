<?php
$this->addStyle("apps.css");

if($node === "index"){
  $this->addScript("jquery.isotope.js");
  $this->addScript("apps.js");
  
  \Lobby::setTitle("Store - Lobby");
  
  $query = "SELECT * FROM `apps` WHERE 1 ";
  $params = array();
  
  if(isset($_GET['q'])){
    $query .= "AND (`name` LIKE :q OR `description` LIKE :q) ";
    $params[":q"] = "%{$_GET['q']}%";
    $q = htmlspecialchars(urldecode($_GET['q']));
  }
  /**
   * Category
   */
  if(isset($_GET['c'])){
    $c = htmlspecialchars($_GET['c']);
    $query .= "AND `category` = :c ";
    $params[":c"] = $c;
    
    \Lobby::setTitle(ucfirst($c) . " Store");
  }
  
  /**
   * Sub Category
   */
  if(isset($_GET['sc'])){
    $sc = htmlspecialchars($_GET['sc']);
    $query .= "AND `sub_category` = :sc ";
    $params[":sc"] = $sc;
    
    \Lobby::setTitle(ucfirst($sc) . " Store");
  }
  
  $sql = \Lobby\DB::$dbh->prepare($query);
  $sql->execute($params);
  $apps = $sql->fetchAll();
  
  require_once APP_DIR . "/src/inc/Fr.star.php";
  $star = new \Fr\Star(array());
  
  require_once APP_DIR . "/src/inc/views/sidebar.apps.php";
?>
  <div class="contents">
    <div class="apps" id="apps" style="height: 100%;width: 100%;">
      <?php
      if(count($apps) == 0){
        ser("No App Found", "No app was found with the critera you gave");
      }
      foreach($apps as $app){
        $app['image'] == "" ? $app['image'] = $this->srcURL . "/src/image/blank.png" : "";
      ?>
        <div class="app">
          <a href="/apps/<?php echo $app['id'];?>" style="display: block;">
            <div class="cover">
              <?php echo $app['short_description'];?>
            </div>
            <div class="main">
              <img src="<?php echo L_URL;?>/api/app/<?php echo $app['id'];?>/logo" />
              <div class="info">
                <div style="float: left;">
                  <span><?php echo $app['name'];?></span>
                  <?php
                  $star->id = "app-" . $app['id'];
                  echo $star->getRating();
                  ?>
                </div>
                <span style="position: absolute;bottom: 0px;right: 0;"><?php echo $app['downloads'];?> downloads</span>
              </div>
            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
<?php
}else{
  $sql = \Lobby\DB::$dbh->prepare("SELECT * FROM `apps` WHERE `id` = ?");
  $sql->execute(array($node));
  
  if($sql->rowCount() == "0"){
    ser();
  }else{
    /**
     * Re add jQueryUI
     */
    \Lobby::addStyle("jqueryui", "/includes/lib/jquery/jquery-ui.css"); // jQuery UI
    
    $this->addStyle("app.css");
    $app_info = $sql->fetch(\PDO::FETCH_ASSOC);
    
    \Lobby::setTitle($app_info['name'] . " | Store");
    
    require_once APP_DIR . "/src/inc/Parsedown.php";
    $Parsedown = new Parsedown();
    require_once APP_DIR . "/src/inc/views/sidebar.apps.php";
?>
    <div class="contents" style='padding-left: 10px;'>
      <h1><a href=""><?php echo $app_info['name'];?></a></h1>
      <p><?php echo $app_info['short_description'];?></p>
      <ol style="list-style: none;padding: 0px;">
        <li style="display: inline-block;">
          <a href="/apps?c=<?php echo $app_info['category'];?>" class='button red'><?php echo $this->app_categories[$app_info['category']];?></a> >
        </li>
        <li style="display: inline-block;">
          <a href="/apps?sc=<?php echo $app_info['sub_category'];?>" class='button green'><?php echo $this->app_sub_categories[$app_info['category']][$app_info['sub_category']];?></a>
        </li>
      </ol>
      <div id="app-tabs">
        <ul>
          <li><a href="#description">Description</a></li>
          <li><a href="#screenshots">Screenshots</a></li>
          <li><a href="#stats">Stats</a></li>
          <li><a href="#download">Download</a></li>
        </ul>
        <script>
          $(".workspace #app-tabs").tabs({
            activate: function(event, ui) {
              window.location.hash = ui.newPanel.attr('id');
            }
          });
        </script>
        <div id="description">
          <p><?php echo $Parsedown->text($app_info['description']);?></p>
        </div>
        <div id="screenshots">
          <center style="margin: 20px;"><img src="<?php echo L_URL;?>/api/app/<?php echo $node;?>/logo" alt='Logo' title="App Logo" /></center>
          <?php
          $screenshots = explode("\n", $app_info['screenshots']);
          if(count($screenshots) > 1){
            $this->addScript("jquery.responsiveslides.js");
            
            echo '<ul class="rslides">';
              foreach($screenshots as $screenshot){
                echo "<li><img src='$screenshot' /></li>";
              }
            echo "</ul>";
          ?>
            <script>
              $(function() {
                $(".workspace #screenshots .rslides").responsiveSlides({
                  auto: false,
                  pager: true
                });
              });
            </script>
          <?php
          }else{
            ser("No Screenshots", "This app has no screenshots");
          }
          ?>
        </div>
        <div id="stats">
          <h2>Ratings</h2>
          <?php
          require_once APP_DIR . "/src/inc/Fr.star.php";
          $this->addScript("Fr.star.js");
          
          $star = new \Fr\Star(array(), "app-{$app_info['id']}");
          echo "<div class='ratings'>";
            echo $star->getRating();
            echo "<div id='rating'></div>";
          echo "</div>";
          ?>
          <script>
            window.addEventListener('load', function(){ 
              function fr_star(){
                $(".contents .ratings #rating").text($(".Fr-star").data("title"));
                $(".Fr-star").Fr_star(function(rating){
                  lobby.app.ajax("rate.php", {'id' : '<?php echo "app-{$app_info['id']}";?>', 'rating': rating}, function(r){
                    if(r == "error"){
                      alert("You have to log in to rate apps");
                    }else{
                      $(".contents .ratings").html(r);
                      fr_star();
                    }
                  });
                });
              }
              fr_star();
            });
          </script>
          <h3><?php echo $app_info['downloads'];?> Downloads</h3>
        </div>
        <div id="download">
          <table style="width: 700px;">
            <tbody>
              <tr>
                <td>Author</td>
                <td><a href='/u/<?php echo $app_info['author'];?>'><?php echo \Fr\LS2::getUser("name", $app_info['author']);?></a></td>
              </tr>
              <tr>
                <td>Version</td>
                <td><?php echo $app_info['version'];?></td>
              </tr>
              <tr>
                <td>Updated</td>
                <td title="UTC Time Zone"><?php echo $app_info['updated'];?></td>
              </tr>
              <tr>
                <td>Web Page</td>
                <td><?php echo "<a href='{$app_info['app_page']}' target='_blank'>App's Web Page</a>";?></td>
              </tr>
              <tr>
                <td></td>
                <td><a style='display: block;font-size: 16px;height: 60px;color: white;' class='button green' onclick="node = document.createElement('iframe');node.src = this.href;node.style.cssText = 'display:none;position: absolute;left:-1000px;';node.addEventListener('load', function(){$(this).remove();clog('c');}, true);document.body.appendChild(node);return false;" href="<?php echo L_URL;?>/api/app/<?php echo $app_info['id'];?>/download">Download Zip File<font size='1' style='display:block;margin-top: -10px;'><?php echo $app_info['downloads'];?> Downloads</font></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>  
    </div>
<?php
  }
}
require_once APP_DIR . "/src/inc/views/track.php";
