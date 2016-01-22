<?php
/**
 * Custom
 */
date_default_timezone_set("UTC");
/**
 * End Custom
 */

/* The Configuration File - Be careful while editing */
$cfg = array(
  'db' => array(
    'host' => getenv('OPENSHIFT_MYSQL_DB_HOST'),
    'port' => getenv('OPENSHIFT_MYSQL_DB_PORT'),
    'username' => getenv('OPENSHIFT_MYSQL_DB_USERNAME'),
    'password' => getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),
    'dbname' => "lobby",
    'prefix' => 'l_'
  ),
  /**
   * The GLOBAL unique ID of YOUR Lobby installation
   */
  'lobbyID' => getenv('LOBBY_lobbyID'),
  /**
   * A Secure Identity of YOUR Lobby Installation.
   * Never reveal it TO ANYONE
   */
  'secureID' => getenv('LOBBY_secureID'),
  'debug' => true,
  'server_check' => false,
  
  'lobby_url' => "https://lobby.subinsb.com"
);

if($_SERVER["HTTP_HOST"] === "server.lobby".".sim"){
  unset($cfg['lobby_url']);
}
return $cfg;
/* DO NOT EDIT THIS FILE IF YOU DON'T KNOW WHAT YOU'RE DOING - Subin */
?>
