<?php
namespace Lobby\Module;

use Assets;

class app_lobby_server extends \Lobby\Module {

  public function init(){
    if(!\Lobby::status("lobby.admin")){
      \Lobby::hook("head.begin", function(){
        Assets::removeCSS('theme.hine-/src/main/lib/jquery-ui/jquery-ui.css');
        $css = Assets::getCSS();
        foreach($css as $n => $url){
          if($n != "home" && $n != "lobby-server-apps.css" && $n !== "theme.hine-/src/main/css/font.css"){
            echo "<link async='async' href='". Assets::getServeURL("css", array(
              "THEME_URL" => THEME_URL
            ), array($n)) ."' rel='stylesheet'/>";
            Assets::removeCSS($n);
          }
        }
      });
    }
  }

}
