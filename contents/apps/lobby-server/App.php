<?php
namespace Lobby\App;

class lobby_server extends \Lobby\App {
  
  public $lobby_version = "0.3";
  public $lobby_released = "2015-01-20";
  public $lobby_release_notes = '<span style="color:red;font-size:40px;">DON\'T UPDATE !</span><p>All users should reinstall Lobby as there have been a LOT of changes. Sorry... <a href="http://lobby.subinsb.com/blog/version-0.3">More Info here</a></p>';
  
  public $app_categories = array(
    "accessories" => "Accessories",
    "development" => "Development",
    "games" => "Games",
    "multimedia" => "Multimedia",
  );
  public $app_sub_categories = array(
    "accessories" => array(
      "office" => "Office",
      "tools" => "Tools"
    ),
    "development" => array(
      "graphics" => "Graphics",
      "web" => "Web",
      "programming" => "Programming"
    ),
    "games" => array(
      "multiplayer" => "Multiplayer",
      "puzzles" => "Puzzles",
      "sports" => "Sports",
    ),
    "multimedia" => array(
      "music" => "Music",
      "photos" => "Photos",
      "video" => "Video"
    )
  );
  
  public function page($p){
    /**
     * Clean up Assets
     */
    unset(\Lobby::$css["theme.hine-/src/dashboard/css/scrollbar.css"]);
    unset(\Lobby::$css["theme.hine-/src/dashboard/css/jquery.contextmenu.css"]);
    unset(\Lobby::$css["theme.hine-/src/dashboard/css/dashboard.css"]);
    unset(\Lobby::$css["jqueryui"]);
    
    unset(\Lobby::$js["jquery-ui"]);
    unset(\Lobby::$js["theme.hine-/src/dashboard/js/scrollbar.js"]);
    unset(\Lobby::$js["theme.hine-/src/dashboard/js/jquery.contextmenu.js"]);
    unset(\Lobby::$js["theme.hine-/src/dashboard/js/Packery.js"]);
    unset(\Lobby::$js["theme.hine-/src/dashboard/js/dashboard.js"]);
    unset(\Lobby::$js["app"]);
    
    /**
     * Mobile
     */
    \Lobby::hook("head.end", function(){
      echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    });
    
    $path = explode("/", $p);
    if($path[1] == "docs"){
      $doc = isset($path[2]) ? str_replace("/", ".", substr_replace($p, "", 0, 6)) : "index";
      
      $this->menu_items();

      return $this->inc("/src/page/docs.php", array(
        "doc" => $doc
      ));
    }elseif($path[1] == "mods"){
      $mod = isset($path[2]) ? str_replace("/", ".", substr_replace($p, "", 0, 6)) : "index";
      
      $this->menu_items();
      
      return $this->inc("/src/page/mods.php", array(
        "mod" => $mod
      ));
    }else if($path[1] == "api"){
      $node = isset($path[2]) ? $path[2] : "index";
      
      return $this->inc("/src/page/api.php", array(
        "node" => $node,
        "path" => $path
      ));
    }else if($path[1] == "me"){
      $this->menu_items();
      $node = isset($path[2]) ? $path[2] : "index";
      
      return $this->inc("/src/page/me.php", array(
        "node" => $node,
        "path" => $path
      ));
    }else if($path[1] == "apps"){
      $this->menu_items();
      $node = isset($path[2]) ? $path[2] : "index";
      
      return $this->inc("/src/page/apps.php", array(
        "node" => $node
      ));
    }else if($path[1] == "u"){
      $this->menu_items();
      $node = isset($path[2]) ? $path[2] : "index";
      
      return $this->inc("/src/page/u.php", array(
        "user" => $node
      ));
    }else{
      $this->menu_items();
      return "auto";
    }
  }
  
  public function menu_items(){
    $this->addScript("responsive.js");
    $this->addStyle("style.css");
    \Lobby\UI\Panel::addTopItem("lobbyDownload", array(
      "position" => "left",
      "text" => "<span class='button orange' style='margin:0;padding: 0 10;'>Download</span>",
      "href" => "/download"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyWeb", array(
      "position" => "left",
      "text" => "<span class='button indigo' style='margin:0;padding: 0 10;'>Lobby Web</span>",
      "href" => "/web-readme"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyApps", array(
      "position" => "left",
      "text" => "<span class='button green' style='margin:0;padding: 0 10;'>Apps</span>",
      "href" => "/apps"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyBlog", array(
      "position" => "left",
      "text" => "<span class='button red' style='margin:0;padding: 0 10;'>Blog</span>",
      "href" => "/blog"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyDocs", array(
      "position" => "left",
      "text" => "<span class='button' style='margin:0;padding: 0 10;'>Docs</span>",
      "href" => "/docs",
      "subItems" => array(
        "mods" => array(
          "text" => "Modules",
          "href" => "/mods"
        )
      )
    ));
    
    require_once APP_DIR . "/src/inc/logsys.php";
    
    $meSubItems = array();
    if(\Fr\LS2::$loggedIn){
      $meSubItems["Profile"] = array(
        "text" => "My Profile",
        "href" => "/u/" . \Fr\LS2::$user
      );
      $meSubItems["EditProfile"] = array(
        "text" => "Edit Profile",
        "href" => "/me/profile"
      );
      $meSubItems["SubmitApp"] = array(
        "text" => "Submit App",
        "href" => "/me/app"
      );
      $meSubItems["LogOut"] = array(
        "text" => "Log Out",
        "href" => "/me/login?logout"
      );
    }else{
      $meSubItems["LogIn"] = array(
        "text" => "Log In",
        "href" => "/me/login"
      );
    }
    
    \Lobby\UI\Panel::addTopItem("lobbyUser", array(
      "position" => "right",
      "text" => \Fr\LS2::$loggedIn ? \Fr\LS2::getUser("display_name") : "Me",
      "href" => "/me",
      "subItems" => $meSubItems
    ));
  }
  
  public function download($file_name, $file_path = ""){
    if(file_exists($file_path)){
      header("Content-Disposition: attachment; filename=\"$file_name\"");
      header("Pragma: public");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      
      /**
       * Resumable download
       */
      header("Accept-Ranges: bytes");
      
      $filesize = filesize($file_path);

      $offset = 0;
      $length = $filesize;

      if ( isset($_SERVER['HTTP_RANGE']) ) {
	      // if the HTTP_RANGE header is set we're dealing with partial content

	      $partialContent = true;

	      // find the requested range
	      // this might be too simplistic, apparently the client can request
	      // multiple ranges, which can become pretty complex, so ignore it for now
	      preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);

	      $offset = intval($matches[1]);
	      $length = intval($matches[2]) - $offset;
      }else{
        $partialContent = false;
      }
    
      set_time_limit(0);
      $file = fopen($file_path, 'r');

      // seek to the requested offset, this is 0 if it's not a partial content request
      fseek($file, $offset);
      
      $data = fread($file, $length);
      fclose($file);

      if ( $partialContent ) {
	      // output the right headers for partial content

	      header('HTTP/1.1 206 Partial Content');
	      header('Content-Range: bytes ' . $offset . '-' . ($offset + $length) . '/' . $filesize);
      }
      header('Content-Length: ' . $filesize);
      header('Content-Type: ' . filetype($file_path));
      
      print $data;
    }else{
      ser("<h2>File Doesn't Exist</h2>", "The file you requested to download isn't available on the server.");
    }
  }
}
