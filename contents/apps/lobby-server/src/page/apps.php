<?php
$this->addStyle("apps.css");
$this->addScript("apps.js");

if($node === "index"){  
  \Lobby::setTitle("Store");
  
  $query = "SELECT * FROM `apps` WHERE 1 ";
  $params = array();
   
  /**
   * Search
   */
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
  
  /**
   * Browse
   */
  if(isset($_GET['browse'])){
    if($_GET['browse'] === "new"){
      $query .= "ORDER BY `updated` DESC";
    }else if($_GET['browse'] === "popular"){
      $query .= "ORDER BY `downloads` DESC";
    }
  }
  
  $sql = \Lobby\DB::$dbh->prepare($query);
  $sql->execute($params);
  $apps = $sql->fetchAll();
  
  require_once APP_DIR . "/src/inc/Fr.star.php";
  $star = new \Fr\Star(array());
?>
  <div class="contents">
    <?php
    require_once APP_DIR . "/src/inc/views/top.apps.php";
    ?>
    <div class="apps">
      <?php
      if(count($apps) == 0){
        ser("No App Found", "No app was found with the critera you gave");
      }else{
        function get_timeago( $ptime )
        {
            $estimate_time = time() - $ptime;
        
            if( $estimate_time < 1 )
            {
                return 'less than 1 second ago';
            }
        
            $condition = array( 
                        12 * 30 * 24 * 60 * 60  =>  'year',
                        30 * 24 * 60 * 60       =>  'month',
                        24 * 60 * 60            =>  'day',
                        60 * 60                 =>  'hour',
                        60                      =>  'minute',
                        1                       =>  'second'
            );
        
            foreach( $condition as $secs => $str )
            {
                $d = $estimate_time / $secs;
        
                if( $d >= 1 )
                {
                    $r = round( $d );
                    return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                }
            }
        }
        foreach($apps as $app){
          $app['logo'] = $app['logo'] === "0" ? APP_URL . "/src/image/blank.png" : APP_URL . "/api/app/{$app['id']}/logo";
        ?>
          <div class="app">
            <div class="app-inner">
              <div class="lpane">
                <a href="<?php echo APP_URL . "/apps/" . $app['id'];?>">
                  <img src="<?php echo $app['logo'];?>" />
                </a>
              </div>
              <div class="rpane">
                <a href="<?php echo APP_URL . "/apps/" . $app['id'];?>" class="name"><?php echo $app['name'];?></a>
                <p class="description"><?php echo $app['short_description'];?></p>
                <p>By: <a href="<?php echo APP_URL . "/u/" . $app['author'];?>"><?php echo \Fr\LS2::getUser("name", $app['author']);?></a></p>
              </div>
            </div>
            <div class="bpane">
              <div class="lside">
                <?php
                $star->id = "app-" . $app['id'];
                echo $star->getRating();
                echo "<div class='downloads'>" . $app['downloads'] . " downloads</div>";
                ?>
              </div>
              <div class="rside">
                <div>Updated <?php echo get_timeago(strtotime($app['updated']));?></div>
                <div>Version : <?php echo $app['version'];?></div>
              </div>
            </div>
          </div>
        <?php
        }
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
    $this->addStyle("app.css");
    $app_info = $sql->fetch(\PDO::FETCH_ASSOC);
    
    \Lobby::setTitle($app_info['name'] . " | Store");
    
    require_once APP_DIR . "/src/inc/Parsedown.php";
    $Parsedown = new Parsedown();
?>
    <div class="contents" style='padding-left: 10px;'>
      <?php
      $no_header = 1;
      require_once APP_DIR . "/src/inc/views/top.apps.php";
      ?>
      <h1>
        <a href=""><?php echo $app_info['name'];?></a>
        <a data-path="/admin/lobby-store.php?id=<?php echo $node;?>" class="open-via-lobby" title="Open in Lobby"><i class="material-icons">open_in_new</i></a>
      </h1>
      <p><?php echo $app_info['short_description'];?></p>
      <ol style="list-style: none;padding: 0 0 5px 0;">
        <li style="display: inline-block;">
          <a href="/apps?c=<?php echo $app_info['category'];?>" class='btn red'><?php echo $this->app_categories[$app_info['category']];?></a> >
        </li>
        <li style="display: inline-block;">
          <a href="/apps?sc=<?php echo $app_info['sub_category'];?>" class='btn green'><?php echo $this->app_sub_categories[$app_info['category']][$app_info['sub_category']];?></a>
        </li>
      </ol>
      <div id="app-tabs">
        <ul class="tabs">
          <li class="tab"><a href="#description">Description</a></li>
          <li class="tab"><a href="#screenshots">Screenshots</a></li>
          <li class="tab"><a href="#stats">Stats</a></li>
          <li class="tab"><a href="#download">Download</a></li>
        </ul>
        <script>
          lobby.load(function(){
            $(".workspace #app-tabs .tabs").tabs();
          });
        </script>
        <div id="description">
          <p><?php echo $Parsedown->text($app_info['description']);?></p>
        </div>
        <div id="screenshots">
          <?php
          $screenshots = explode("\n", $app_info['screenshots']);
          if(count($screenshots) > 1){

            echo '<ul class="rslides">';
              foreach($screenshots as $screenshot){
                if($screenshot != ""){
                  echo "<li><a href='$screenshot' target='_blank'><img src='$screenshot' /></a></li>";
                }
              }
            echo "</ul>";
          ?>
            <script src="<?php echo APP_SRC;?>/src/js/responsiveslides.min.js"></script>
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
          <p>
            <strong><?php echo $app_info['downloads'];?> Downloads</strong>
          </p>
          <?php
          require_once APP_DIR . "/src/inc/Fr.star.php";
          $this->addScript("Fr.star.js");
          
          $star = new \Fr\Star(array(), "app-{$app_info['id']}");
          echo "<div class='ratings'>";
            echo $star->getRating("ableToRate");
            echo "<div id='rating'></div>";
          echo "</div>";
          ?>
          <script>
            window.addEventListener("load", function(){
              function fr_star(){
                $(".contents .ratings #rating").text($(".Fr-star").data("title"));
                $(".Fr-star").Fr_star(function(rating){
                  lobby.ajax("rate.php", {'id' : '<?php echo "app-{$app_info['id']}";?>', 'rating': rating}, function(r){
                    if(r == "error"){
                      alert("You have to log in to rate apps");
                    }else{
                      $(".contents .ratings").html(r);
                      fr_star();
                    }
                  }, "lobby-server");
                });
              }
              fr_star();
            });
          </script>          
        </div>
        <div id="download">
          <div class="chip">Version : <?php echo $app_info['version'];?></div><cl/>
          <div class="chip"><span>Requirements :</span></div>
          <ul class="collection" style="margin-left: 20px;">
            <?php
            foreach(json_decode($app_info['requires'], true) as $k => $v){
              echo "<li class='collection-item'>$k {$v[0]} {$v[1]}</li>";
            }
            ?>
          </ul><cl/>
          <div class="chip">Author : <a href='/u/<?php echo $app_info['author'];?>'><?php echo \Fr\LS2::getUser("name", $app_info['author']);?></a></div><cl/>
          <div class="chip" title="UTC Time Zone">Updated : <?php echo $app_info['updated'];?></div><cl/>
          <div class="chip">Web Page : <?php echo "<a href='{$app_info['app_page']}' target='_blank'>". htmlspecialchars($app_info['app_page']) ."</a>";?></div>
          <a style='display: block;font-size: 16px;height: 60px;color: white;margin: 20px;' class='btn green' onclick="node = document.createElement('iframe');node.src = this.href;node.style.cssText = 'display:none;position: absolute;left:-1000px;';node.addEventListener('load', function(){$(this).remove();clog('c');}, true);document.body.appendChild(node);return false;" href="<?php echo L_URL;?>/api/app/<?php echo $app_info['id'];?>/download">Download Zip File<font size='1' style='display:block;margin-top: -10px;'><?php echo $app_info['downloads'];?> Downloads</font></a>
          <div style="margin: 10px 0;">
            <a href="http://server.lobby.sim/docs/install-app" class="btn" target="_blank">App Installation Instructions</a>
          </div>
        </div>
      </div>  
    </div>
<?php
  }
}
require_once APP_DIR . "/src/inc/views/track.php";
