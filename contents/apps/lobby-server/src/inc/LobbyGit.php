<?php
require_once __DIR__ . "/http.php";
require_once __DIR__ . "/git.php";

class LobbyGit {

  private $git_url = "", $id = 0;
  
  public function __construct($id, $git_url){
    $git = new git_client_class;
    set_time_limit(0);
    $git = new git_client_class;

    /* Connection timeout */
    $git->timeout = 20;

    /* Data transfer timeout */
    $git->data_timeout = 60;

    /* Output debugging information about the progress of the connection */
    $git->debug = 0;

    /* Output debugging information about the HTTP requests */
    $git->http_debug = 0;

    /* Format dubug output to display with HTML pages */
    $git->html_debug = true;

    $arguments = array(
        'Repository' => $git_url,
        'Module' => ''
    );
    $error_code = "";
    
    if($git->Connect($arguments, $error_code)){
      var_dump($git->Checkout($arguments));
    }

    
    $this->id = $id;
    $this->git_url = $git_url;
    $this->register();
  }
  
  public function register(){
    $sql = \Lobby\DB::$dbh->prepare("UPDATE `git_cache` SET `created` = ? WHERE `git_url` = ?");
    $sql->execute(array(time(), $this->git_url));
    if($sql->rowCount() === 0){
      $sql = \Lobby\DB::$dbh->prepare("INSERT INTO `git_cache` VALUES(?, ?)");
      $sql->execute(array($this->git_url, time()));
    }
  }
  
  public function download(){
    
  }
  
  public function image(){
    $this->repo->checkout('master');
    
  }
  
}
