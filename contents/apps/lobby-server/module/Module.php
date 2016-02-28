<?php
namespace Lobby\Module;

class app_lobby_server extends \Lobby\Module {

  public function init(){
    if(!\Lobby::status("lobby.admin")){
      \Lobby::hook("head.begin", function(){
        $css = \Lobby::$css;
        foreach($css as $n => $url){
          if($n != "home" && $n != "lobby-server-apps.css" && $n !== "jqueryui" && $n !== "theme.hine-/src/main/css/font.css"){
            unset(\Lobby::$css[$n]);
            echo "<link async href='{$url}' rel='stylesheet'/>";
          }
        }
      });
    }
  }

}
