<?php
namespace Lobby\App;

class lobby_server extends \Lobby\App {
  
  public $lobby_version = "0.6";
  public $lobby_released = "2016-05-04";
  public $lobby_release_notes = '<p>0.6 version comes with new features and has fixed some <a href="https://media.giphy.com/media/3oEdv0RAeAqr2cv1Ic/giphy.gif" target="_blank">HUGE</a> bugs.</p><p>If you are using versions <b>0.5</b> or old, <b>REMOVE</b> all apps before proceeding to update.</p>';
  
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
    \Assets::removeCSS(array(
      "theme.hine-/src/dashboard/css/scrollbar.css",
      "theme.hine-/src/dashboard/css/jquery.contextmenu.css",
      "theme.hine-/src/dashboard/css/dashboard.css",
      "theme.hine-/src/main/lib/jquery-ui/jquery-ui.css",
      
    ));
    
    \Assets::js("jqueryui", "");
    
    \Assets::removeJs(array(
      "theme.hine-/src/dashboard/js/scrollbar.js",
      "theme.hine-/src/dashboard/js/jquery.contextmenu.js",
      "theme.hine-/src/dashboard/js/dashboard.js",
      "app"
    ));
    
    /**
     * Mobile
     */
    \Lobby::hook("head.end", function(){
      echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
      if(\Lobby::$hostName != "server.lo"."bby.sim"){
        echo '<script>if (window.location.protocol != "https:") window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);</script>';
      }
    });
    
    /**
     * Add notifications
     */
    \Lobby\UI\Panel::addNotifyItem("lobby-0-6-released", array(
      "contents" => "Lobby 0.6 Released",
      "href" => "/downloads",
      "icon" => "update"
    ));
    
    $path = explode("/", $p);
    
    if($path[1] === "docs"){
      $doc = isset($path[2]) ? str_replace("/", ".", substr_replace($p, "", 0, 6)) : "index";
      
      $this->menu_items();
      
      \Assets::removeJs("theme.hine-/src/main/js/init.js");

      return $this->inc("/src/page/docs.php", array(
        "doc" => $doc
      ));
    }elseif($path[1] === "mods"){
      $mod = isset($path[2]) ? str_replace("/", ".", substr_replace($p, "", 0, 6)) : "index";
      
      $this->menu_items();
      
      \Assets::removeJs("theme.hine-/src/main/js/init.js");
      
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
      "text" => "<span class='btn orange' style='margin:0;padding: 0 10px;'>Download</span>",
      "href" => "/download"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyWeb", array(
      "position" => "left",
      "text" => "<span class='btn indigo' style='margin:0;padding: 0 10px;'>Demo</span>",
      "href" => "/web-readme"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyApps", array(
      "position" => "left",
      "text" => "<span class='btn green' style='margin:0;padding: 0 10px;'>Apps</span>",
      "href" => "/apps"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyBlog", array(
      "position" => "left",
      "text" => "<span class='btn red' style='margin:0;padding: 0 10px;'>Blog</span>",
      "href" => "/blog"
    ));
    \Lobby\UI\Panel::addTopItem("lobbyDocs", array(
      "position" => "left",
      "text" => "<span class='btn' style='margin:0;padding: 0 10px;'>Docs</span>",
      "href" => "/docs",
      "subItems" => array(
        "mods" => array(
          "text" => "Modules",
          "href" => "/mods"
        ),
        "install_apps" => array(
          "text" => "Install Apps",
          "href" => "/docs/install-app"
        ),
        "dev_docs" => array(
          "text" => "Developer",
          "href" => "/docs/dev"
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
