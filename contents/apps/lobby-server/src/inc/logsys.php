<?php
require __DIR__ . "/class.logsys.php";

\Fr\LS2::$config = array(
  "db" => array(),
  "features" => array(
    "auto_init" => false,
    "start_session" => false,
    "email_login" => false,
    "block_brute_force" => false
  ),
  "keys" => array(
    "cookie" => getenv("LOBBY_LOGSYS_cookie"),
    "salt" => getenv("LOBBY_LOGSYS_salt")
  ),
  "pages" => array(
    "no_login" => array(
      "/me", "/me/open"
    ),
    "login_page" => "/me/login",
    "home_page" => "/me/home"
  ),
  "cookies" => array(
    "expire" => "+28 days"
  )
);
\Fr\LS2::construct();
