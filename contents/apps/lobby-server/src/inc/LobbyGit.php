<?php
require_once __DIR__ . "/vendor/autoload.php";

class LobbyGit {

  private $git_url = "", $id = 0, $git_dir = "";
  
  public function __construct($id, $git_url){
    $this->id = $id;
    $this->git_url = $git_url;
    $this->git_dir = APP_DIR . "/src/data/git-cache/$id";
    $this->register();
  }
  
  public function register(){
    $sql = \Lobby\DB::$dbh->prepare("UPDATE `git_cache` SET `created` = NOW() WHERE `git_url` = ?");
    $sql->execute(array($this->git_url));
    
    if($sql->rowCount() === 0 && !file_exists($this->git_dir)){
      $sql = \Lobby\DB::$dbh->prepare("INSERT INTO `git_cache` VALUES(?, '', NOW())");
      $sql->execute(array($this->git_url));
      $this->getRepo();
    }
  }
  
  public function update(){
    $sql = \Lobby\DB::$dbh->prepare("DELETE FROM `git_cache` WHERE `git_url` = ?");
    $sql->execute(array($this->git_url));
    
    $this->recursiveRemoveDirectory($this->git_dir);
    $this->register();
  }
  
  public function getRepo(){
    $repo = Gitonomy\Git\Admin::cloneTo($this->git_dir, $this->git_url, false);
    $commit_hash = $repo->getReferences()->getBranch('master')->getCommitHash();
    
    $sql = \Lobby\DB::$dbh->prepare("UPDATE `git_cache` SET `last_commit` = ? WHERE `git_url` = ?");
    $sql->execute(array($commit_hash, $this->git_url));
    
    $this->recursiveRemoveDirectory($this->git_dir . "/.git");
    
    if(exec("cd {$this->git_dir};zip -r '{$this->git_dir}/app.zip' ./ -1 -q;") !== false){
      if(file_exists($this->git_dir . "/src/image/logo.png")){
        if(copy($this->git_dir . "/src/image/logo.png", $this->git_dir . "/logo.png")){
          $this->recursiveRemoveDirectory($this->git_dir, array($this->git_dir . '/app.zip', $this->git_dir . '/logo.png'), false);
        }
      }else{
        $this->recursiveRemoveDirectory($this->git_dir, array($this->git_dir . '/app.zip', $this->git_dir . '/logo.png'), false);
      }
    }
  }
  
  public function download(){
    return $this->git_dir . "/app.zip";
  }
  
  public function image(){
    header("Content-type: image/png");
    echo file_get_contents($this->git_dir . "/logo.png");
  }
  
  /**
   * Recursive Directory Remover
   */
  public function recursiveRemoveDirectory($dir, $exclude = array(), $remove_parent = true) {
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
      $file_name = $file->getFilename();
      $path = $file->getRealPath();
      if ($file_name === '.' || $file_name === '..' || in_array($path, $exclude)) {
          continue;
      }
      if ($file->isDir()){
        rmdir($path);
      } else {
        unlink($path);
      }
    }
    if($remove_parent){
      rmdir($dir);
    }
  }
  
}
