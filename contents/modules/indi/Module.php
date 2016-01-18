<?php
namespace Lobby\Module;

class indi extends \Lobby\Module {

  public function init(){
    $config = json_decode(\Lobby\FS::get("/contents/modules/indi/config.json"), true);
    $GLOBALS['AppID'] = $config['app_id'];
    
    \Lobby::hook("router.finish", function(){
      /**
       * Route App Pages (/app/{appname}/{page}) to according apps
       */
      \Lobby\Router::route("/?[*:page]?", function($request){
        $AppID = $GLOBALS['AppID'];
        $page = $request->page != "" ? "/{$request->page}" : "/";
        
        if(substr($page, 0, 6) == "/admin"){
          return false;
        }else{
          /**
           * Check if App exists
           */
          $App = new \Lobby\Apps($AppID);
          if($App->exists && $App->isEnabled()){
            /**
             * Redirect /src/ files to App's Source in /contents folder
             */
            if(substr($page, 0, 5) == "/src/"){
              \Lobby::redirect("/contents/apps/{$AppID}/src/" . substr($page, 5));
            }else{
              /**
               * Change APP_URL constant
               */
              define("APP_URL", L_URL);
              
              $class = $App->run();
              $AppInfo = $App->info;
        
              /**
               * Set the title
               */
              \Lobby::setTitle($AppInfo['name']);
      
              $page_response = $class->page($page);
              if($page_response == "auto"){
                if($page == "/"){
                  $page = "/index";
                }
                $GLOBALS['workspaceHTML'] = $class->inc("/src/page{$page}.php");
              }else{
                $GLOBALS['workspaceHTML'] = $page_response;
              }
              if($GLOBALS['workspaceHTML'] == ""){
                return false;
              }
            }
          }
        }
      });
    });
    \Lobby\Router::route("/app/[:appID]?/[**:page]?", function($request){
      ser();
    });
  }
}
