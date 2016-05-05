<?php
namespace Fr;

class Process{

  public static $os = null;
  public $cmd = null, $options = array(
    "output" => null,
    "arguments" => array()
  );
  
  private static function setOS(){
    if(self::$os === null){
      /**
       * Get the OS
       */
      $os = strtolower(substr(php_uname('s'), 0, 3));
      if ($os == 'lin') {
        self::$os = "linux";
      }else if ($os == 'win') {
        self::$os = "windows";
      }else if ($os == 'mac') {
        self::$os = "mac";
      }
    }
  }
  
  /**
   * 
   */
  public function __construct($cmd, $options){
    $this->cmd = $cmd;
    $this->options = array_replace_recursive($this->options, $options);
    self::setOS();
  }
  
  /**
   * Callback is called when process is started
   */
  public function start($callback = null){
    if(self::$os === "linux" || self::$os === "mac"){
      return $this->startOnNix($callback);
    }else if(self::$os === "windows"){
      return $this->startOnWindows($callback);
    }
  }
  
  /**
   * @param $callback function - Callback made when process started. If this is present, then the connection between server and browser is closed too
   * @return string - The command executed
   */
  public function startOnWindows($callback){
    /**
     * Make Arguments
     */
    $arguments = "";
    foreach($this->options["arguments"] as $option => $value){
      if(is_numeric($option)){
        $arguments .= " " . escapeshellarg($value);
      }else{
        $arguments .= " $option " . escapeshellarg($value);
      }
    }
    
    /**
     * Where to output
     */
    if($this->options["output"] === null){
      $outputFile = "/dev/null";
    }else{
      $outputFile = $this->options["output"];
    }
    $output = " > " . escapeshellarg($outputFile);
    
    $cmd = escapeshellarg($this->cmd) . $arguments . $output;
    
    $bgCmd = escapeshellarg(self::getPHPExecutable()) . " " . escapeshellarg(self::getBGPath()) . " " . escapeshellarg(base64_encode($cmd)) . " > nul 2>&1";
    
    $WshShell = new COM("WScript.Shell");
    $oExec = $WshShell->Run($bgCmd, 0, false);
    
    /**
     * If callback is valid, call callback,
     * then close connection
     */
    if(is_callable($callback)){
      ob_start();
      
      call_user_func($callback);
      header("Content-Length: ".ob_get_length());
      header("Connection: close");
      
      flush();
      ob_flush();
    }
    
    return $cmd;
  }
  
  /**
   * *nix systems :
   *    Linux - Ubuntu, Debian...
   *    Unix - Mac
   * @param $callback function - Callback made when process started. If this is present, then the connection between server and browser is closed too
   * @return string - The command executed
   */
  public function startOnNix($callback){
    /**
     * Make Arguments
     */
    $arguments = "";
    foreach($this->options["arguments"] as $option => $value){
      if(is_numeric($option)){
        $arguments .= " " . escapeshellarg($value);
      }else{
        $arguments .= " $option " . escapeshellarg($value);
      }
    }
    
    /**
     * Where to output
     */
    if($this->options["output"] === null){
      $outputFile = "/dev/null";
    }else{
      $outputFile = $this->options["output"];
    }
    $output = " > " . escapeshellarg($outputFile);
    
    $cmd = escapeshellarg($this->cmd) . $arguments . $output;
    
    $bgCmd = escapeshellcmd(self::getPHPExecutable()) . " " . escapeshellarg(self::getBGPath()) . " " . escapeshellarg(base64_encode($cmd)) . " > /dev/null &";
    exec($bgCmd);
    
    /**
     * If callback is valid, call callback,
     * then close connection
     */
    if(is_callable($callback)){
      ob_start();
      
      call_user_func($callback);
      header("Content-Length: ".ob_get_length());
      header("Connection: close");
      
      flush();
      ob_flush();
    }
    
    return $cmd;
  }
  
  /**
   * Get the Path to PHP binary file
   * Linux - /usr/bin/php
   */
  public function getPHPExecutable() {
    if(defined("PHP_BINARY") && PHP_BINARY != ""){
      return PHP_BINARY;
    }else{
      $paths = explode(PATH_SEPARATOR, getenv('PATH'));
      foreach ($paths as $path) {
        // we need this for XAMPP (Windows)
        if (strstr($path, 'php.exe') && isset($_SERVER["WINDIR"]) && file_exists($path) && is_file($path)) {
          return $path;
        }else {
          $php_executable = $path . DIRECTORY_SEPARATOR . "php" . (isset($_SERVER["WINDIR"]) ? ".exe" : "");
          if (file_exists($php_executable) && is_file($php_executable)) {
            return $php_executable;
          }
        }
      }
    }
    return FALSE; // not found
  }
  
  private function getBGPath(){
    return __DIR__ . "/ProcessBG.php";
  }
  
}
