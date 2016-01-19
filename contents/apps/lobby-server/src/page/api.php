<?php
$lobby_downloads = array(
  "script" => "http://googledrive.com/host/0B2VjYaTkCpiQM0JXUkVneFZtbUk/lobby-install.sh",
  "0.1" => "http://googledrive.com/host/0B2VjYaTkCpiQM0JXUkVneFZtbUk/0.1.zip",
  "0.1.1" => "http://googledrive.com/host/0B2VjYaTkCpiQM0JXUkVneFZtbUk/0.1.1.zip",
  "0.2" => "http://googledrive.com/host/0B2VjYaTkCpiQM0JXUkVneFZtbUk/0.2.zip",
  "0.2.1" => "http://googledrive.com/host/0B2VjYaTkCpiQM0JXUkVneFZtbUk/0.2.1.zip"
);

if($node === "dot.gif"){
  header("Content-type: image/gif");
  include APP_DIR . "/src/image/blank_dot.gif";
}else if($node === "lobby" && isset($path[3])){
  $what = $path[3];
  $version = isset($path[4]) ? $path[4] : "";

  if($what === "download"){
    $version = $version == "latest" ? $this->lobby_version : $version;
    
    if(isset($lobby_downloads[$version])){
      /**
       * Stats
       */
      $sql = \Lobby\DB::$dbh->query("SELECT `value` FROM `lobby` WHERE `key_name` = 'downloads'");
      $lobby_data = json_decode($sql->fetchColumn(), true);

      if(!is_array($lobby_data)){
        $lobby_data = array(
          $version => 0
        );
      }
      $lobby_data[$version] = isset($lobby_data[$version]) ? $lobby_data[$version] + 1 : 1;
      
      $sql = \Lobby\DB::$dbh->prepare("UPDATE `lobby` SET `value` = ? WHERE `key_name` = 'downloads'");
      $sql->execute(array(json_encode($lobby_data)));
      
      /**
       * Download
       */
      header("Location: {$lobby_downloads[$version]}");
    }
  }else if($what === "updates"){
    $response = array(
      "version" => $this->lobby_version,
      "released" => $this->lobby_released,
      "release_notes" => $this->lobby_release_notes
    );
    
    if(isset($_POST['apps'])){
      $apps = $_POST['apps'];
      if(preg_match("/\,/", $apps)){
        $apps = explode(",", $apps);
      }else{
        /**
         * Only a single app is present
         */
        $apps = array($apps);
      }
      
      foreach($apps as $app){
        $sql = \Lobby\DB::$dbh->prepare("SELECT `version` FROM `apps` WHERE `id` = ?");
        $sql->execute(array($app));
        $lat_version = $sql->fetchColumn();
        
        if($lat_version != false){
          $response["apps"][$app] = $lat_version;
        }
      }
    }
    echo json_encode($response);
  }else if($what === "installation-id"){
    function randStr($length){
      $str = "";
      $chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $size=strlen($chars);
      for($i = 0; $i < $length; $i++){
        $str.=$chars[rand(0, $size-1)];
      }
      return $str;
    }
    $lobbyID  = randStr(10) . randStr(15) . randStr(20); // Lobby Global ID
    $lobbySID = hash("sha512", randStr(15) . randStr(30)); // Lobby Secure ID
    ?>
    <html>
      <head></head>
      <body>
        <pre><code><?php
          echo "lobbyID - $lobbyID<br/>";
          echo "lobbySID - $lobbySID";
          ?></code></pre>
      </body>
    </html>
<?php
  }
}else if($node === "app" && isset($path[3]) && isset($path[4])){
  
  $appID = $path[3];
  $what = $path[4];
  if($what === "logo"){
    require_once __DIR__ . "/../inc/LobbyGit.php";
  
    $sql = \Lobby\DB::$dbh->prepare("SELECT `git_url` FROM `apps` WHERE `id` = ?");
    $sql->execute(array($appID));
    
    if($sql->rowCount() === 0){
      echo "error : app doesn't exist";
    }else{
      $lg = new LobbyGit($appID, $sql->fetchColumn());
      $lg->image();
    }
  }else if($what === "download"){
    $sql = \Lobby\DB::$dbh->prepare("SELECT `git_url` FROM `apps` WHERE `id` = ?");
    $sql->execute(array($appID)); // Here $version is actually App ID
    
    if($sql->rowCount() === 0){
      echo "error : app doesn't exist";
    }else{
      $git_url = $sql->fetchColumn();
      $sql = \Lobby\DB::$dbh->prepare("UPDATE `apps` SET `downloads` = `downloads` + 1 WHERE `id` = ?");
      $sql->execute(array($appID));
      
      require_once __DIR__ . "/../inc/LobbyGit.php";
      $lg = new LobbyGit($appID, $git_url);
      $this->download("lobby-app-$appID.zip", $lg->download());
    }
  }
  
}else if($node === "ping"){
  echo "pong";
}else if($node === "apps"){
  $get = H::input("get");
  $p = H::input("p");
  $q = H::input("q");
  $lobby_web = H::input("lobby_web") != null;
  
  if($p === null){
    $start = 0;
    $stop = 10;
  }else{
    $start = ($p - 1) * 10;
    $stop = (($p - 1) * 10) + 10;
  }
  
  $append = array();
  if($get == "newApps"){
    if($lobby_web){
      $query = "SELECT * FROM `apps` WHERE `lobby_web` = '1' ORDER BY `updated` DESC";
      $total_query = "SELECT COUNT(1) FROM `apps` WHERE `lobby_web` = '1'";
    }else{
      $query = "SELECT * FROM `apps` ORDER BY `updated` DESC";
      $total_query = "SELECT COUNT(1) FROM `apps`";
    }
  }else if($get == "app"){
    if($lobby_web){
      $query = "SELECT * FROM `apps` WHERE `id` = :id AND `lobby_web` = '1'";
    }else{
      $query = "SELECT * FROM `apps` WHERE `id` = :id";
    }
    $append[":id"] = H::input("id");
  }else if($q != null){
    $q = "%{$q}%";
    
    if($lobby_web){
      $query = "SELECT * FROM `apps` WHERE `lobby_web` = '1' AND (`name` LIKE :q OR `description` LIKE :q) ORDER BY `updated` DESC";
    }else{
      $query = "SELECT * FROM `apps` WHERE `name` LIKE :q OR `description` LIKE :q ORDER BY `updated` DESC";
    }
    $append[":q"] = $q;
  }else{
    if($lobby_web){
      $query = "SELECT * FROM `apps` WHERE `lobby_web` = '1' ORDER BY `downloads` DESC";
    }else{
      $query = "SELECT * FROM `apps` ORDER BY `downloads` DESC";
    }
  }
  
  $query .= " LIMIT :start, :stop";
  
  $sql = \Lobby\DB::$dbh->prepare($query);
  foreach($append as $name => $value){
    $sql->bindParam($name, $value);
  }
  
  $sql->bindParam(":start", $start, \PDO::PARAM_INT);
  $sql->bindParam(":stop", $stop, \PDO::PARAM_INT);
  $sql->execute();
  
  if($sql->rowCount() == 0){
    echo "false";
  }else{
    $results = $sql->fetchAll(\PDO::FETCH_ASSOC);
    
    if(isset($total_query)){
      $total_apps = \Lobby\DB::$dbh->query($total_query);
      $total_apps = $total_apps->fetchColumn();
    }else{
      $total_apps = 0;
    }
    
    $response = array(
      "apps" => array(),
      "apps_count" => $total_apps
    );
    
    require_once APP_DIR . "/src/inc/Parsedown.php";
    require_once APP_DIR . "/src/inc/Fr.star.php";
    
    $Parsedown = new Parsedown();
    $GLOBALS['star'] = new \Fr\Star(array());
    
    function getAuthorName($id = 1){
      $sql = \Lobby\DB::$dbh->prepare("SELECT `name` FROM `users` WHERE `id` = ?");
      $sql->execute(array($id));
      return $sql->fetchColumn();
    }
    
    function getRating($id){
      $GLOBALS['star']->id = "app-$id";
      return $GLOBALS['star']->getRating("", "rate_value");
    }
    
    $i = 0;
    foreach($results as $r){
      $response['apps'][$i] = $r;
      $response['apps'][$i]['description'] = $Parsedown->text(htmlspecialchars($r['description']));
      $response['apps'][$i]['author'] = getAuthorName($r['author']);
      $response['apps'][$i]['author_page'] = \Lobby::u("/u/{$r['author']}");
      $response['apps'][$i]['rating'] = getRating($r['id']) . "/5";
      $response['apps'][$i]['image'] = L_URL . "/api/app/{$r['id']}/logo";
      $i++;
    }
    
    if(isset($append[":id"])){
      $response = $response['apps'][0];
    }
    
    echo json_encode($response, JSON_FORCE_OBJECT);
  }
}
exit;
?>
