<?php
require_once __DIR__ . "/config.php";

if(\Fr\LS::$loggedIn){
  /**
   * Logged In
   */
  \Lobby::hook("init", function(){
    /**
     * Add Change Password Item in Top Panel -> Admin before Log Out item
     * This is done by first removing the Log Out item, adding the Change
     * Password item and then adding back the Log Out item
     */
    \Lobby\Panel::$top_items['left']['lobbyAdmin']['subItems']['LogOut'] = array(
      "text" => "Log Out",
      "href" => "/../me/login?logout"
    );
  });
  define("lobbyWebUser", \Fr\LS::$user);
}else{
  /**
   * Not logged in
   */
  if(/*\Lobby::curPage() != "/admin/login" &&*/ !\Lobby::status("lobby.install")){
    \Lobby::redirect("../me/login?c=/web");
  }
  \Lobby::hook("init", function(){
    unset(\Lobby\Panel::$top_items['left']['lobbyAdmin']);
  });
}
