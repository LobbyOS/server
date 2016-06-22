<?php
namespace Lobby\Module;

use Response;
use Lobby\Apps;

class indi extends \Lobby\Module {

  public function init(){
    $config = json_decode(\Lobby\FS::get("/contents/modules/indi/config.json"), true);
    $appID = $config['app_id'];
    
    $App = new Apps($appID);
    $App->run();
    
    \Lobby::hook("router.finish", function(){
      /**
       * Route App Pages (/app/{appname}/{page}) to according apps
       */
      \Lobby\Router::route("/?[*:page]?", function($request){
        $appID = Apps::getInfo("id");
        $page = $request->page === null ? "/" : "/{$request->page}";
        
        if(substr($page, 0, 6) == "/admin"){
          return false;
        }else{
          $App = new \Lobby\Apps($appID);
          
          $class = $App->run();
    
          /**
           * Set the title
           */
          Response::setTitle($App->info["name"]);
          
          $pageResponse = $class->page($page);
          if($pageResponse === "auto"){
            if($page === "/"){
              $page = "/index";
            }
            $html = $class->inc("/src/page{$page}.php");
            if($html){
              Response::setPage($html);
            }else{
              ser();
            }
          }else{
            if($pageResponse === null){
              ser();
            }else{
              Response::setPage($pageResponse);
            }
          }
        }
      });
    });
    
    \Lobby\Router::route("/app/[:appID]?/[**:page]?", function($request){
      ser();
    });
    
    /**
     * Disable FilePicker Module
     */
    if(\Lobby\Modules::exists("filepicker")){
      \Lobby\Modules::disableModule("filepicker");
    }
    \Lobby\Router::route("/includes/lib/modules?/[**:page]?", function($request){
      ser();
    });
  }
}
