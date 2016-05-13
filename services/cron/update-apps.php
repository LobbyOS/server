<?php
$_SERVER["HTTP_HOST"] = "server.lobby.sim";
$_SERVER["SERVER_NAME"] = "server.lobby.sim";
$_SERVER["REQUEST_URI"] = "/df/dsfe/";

require __DIR__ . "/../../load.php";

$App = new \Lobby\Apps("lobby-server");
$App->run();

require APPS_DIR . "/lobby-server/src/inc/LobbyGit.php";

/**
 * Argument 1 has the App ID
 */
if(isset($argv[1])){
  $sql = \Lobby\DB::$dbh->prepare("SELECT `id`, `git_url` FROM `apps` WHERE `id` = ?");
  $sql->execute(array($argv[1]));
  
  if($sql->rowCount() !== 0){
    $r = $sql->fetch(\PDO::FETCH_ASSOC);
    
    $LG = new \LobbyGit($r['id'], $r['git_url']);
    $LG->update();
    echo "{$r['id']} updated\r\n";
  }
}else{
  $sql = \Lobby\DB::$dbh->prepare("SELECT `id`, `git_url` FROM `apps` ORDER BY `downloads` DESC");
  $sql->execute();
  
  while($r = $sql->fetch()){
    echo "{$r['id']} updating...\n";
    
    /**
     * Constructing will update app if it hasn't been updated in a day
     */
    $LG = new \LobbyGit($r['id'], $r['git_url']);
    $LG->register();
    
    echo "{$r['id']} updated.\n";
  }
}
