<?php

class LobbyStats {

  public function __construct(){
    if(isset($_POST["lobby"])){
      self::addStat();
    }
  }
  
  public static function addStat(){
    if(isset($_POST["lobby"]["lid"]) && isset($_POST["lobby"]["version"])){
      $sql = \Lobby\DB::$dbh->prepare("INSERT INTO `lobby_api_access` (`lid`, `version`, `accessed`, `frequency`) VALUES (?, ?, UNIX_TIMESTAMP(), '1') ON DUPLICATE KEY UPDATE `accessed` = UNIX_TIMESTAMP(), `frequency` = `frequency` + 1");
      $sql->execute(array($_POST["lobby"]["lid"], $_POST["lobby"]["version"]));
    }
  }

}
