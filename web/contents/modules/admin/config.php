<?php
class logSysLobbyDB {
  public function prepare($query){
    $obj = \Lobby\DB::$dbh->prepare($query);
    return $obj;
  }
}
require_once __DIR__ . "/class.logsys.php";

\Fr\LS::$config = array(
  "db" => array(
    "table" => "users"
  ),
  "features" => array(
    "auto_init" => false,
    "start_session" => false,
    "email_login" => false,
  ),
  "keys" => array(
    "cookie" => "k3#FC9$*p2>23f3.?,3!",
    "salt" => "CNEci3#)(MMv.3e39v./$./';]\]"
  ),
  "pages" => array(
    "no_login" => array(),
    "login_page" => "/admin/login",
    "home_page" => "/admin/"
  )
);
\Fr\LS::construct();
