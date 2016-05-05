<?php
namespace Lobby\Module;

class app_lobby_server extends \Lobby\Module {

  public function init(){
    if(!\Lobby::status("lobby.admin")){
      \Lobby::hook("head.begin", function(){
        \Assets::removeCss('theme.hine-/src/main/lib/jquery-ui/jquery-ui.css');
        $css = \Assets::$css;
        foreach($css as $n => $url){
          if($n != "home" && $n != "lobby-server-apps.css" && $n !== "theme.hine-/src/main/css/font.css"){
            \Assets::removeCss($n);
            echo "<link async='async' href='{$url}' rel='stylesheet'/>";
          }
        }
      });
    }
  }

}
