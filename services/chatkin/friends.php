<?php
function post($url, $params = array()){
  $this->cookies();
  $ch = curl_init();
  
  $fields_string = "";
  if(count($params) != 0){
    foreach($params as $key => $value){
      $fields_string .= "{$key}={$value}&";
    }
    /* Remove Last & char */
    rtrim($fields_string, '&');
  }
  
  $cookies_string = "";
  if(count($this->cookies) != 0){
    foreach($params as $key => $value){
      $cookies_string .= "{$key}={$value}&";
    }
    /**
     * Remove Last & char
     */
    rtrim($cookies_string, '&');
  }
  
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
  curl_setopt($ch, CURLOPT_POST, count($params));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_COOKIE, $cookies_string);
  
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  
  $cookiefile = tempnam(sys_get_temp_dir(), 'FOO');
  file_put_contents($cookiefile, $this->cookies);

  curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
  
  $output = curl_exec($ch);

  if(curl_errno($ch)){
    die("error");
  }
  $info = curl_getinfo($ch);
  curl_close($ch);
  
  $newcookies = file_get_contents($cookiefile);
  $info['cookies'] = $newcookies;
  
  $response = array($output, $info);
  return $response;
}
  
if(isset($_GET['n']) && isset($_GET['u'])){
  $n = $_GET['n'];
  $u = $_GET['u'];
  
  if($n == "facebook"){
    post("http://m.facebook.com/");
  }
}
