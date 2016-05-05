<?php
$mods_location = APP_DIR . "/src/data/mods/";

$mods = array_diff(scandir($mods_location), array('..', '.'));

$mod = isset($mod) ? $mod . ".md" : "index.md";

if(isset($mod) && array_search($mod, $mods) !== false){
  $mod_path = "$mods_location/$mod";
  
  if($mod == "index"){
    \Lobby::setTitle("Modules");
  }else{
    $mod_name = ucwords(preg_replace("/[-|.]/", " ", $mod));
    \Lobby::setTitle($mod_name . " | Modules");
  }
}else{
  ser();
}
$this->addStyle("docs.css");
?>
<div class="sidebar">
  <div style="position: absolute;right: 0px;top: 0px;bottom: 0px;width: 2px;box-shadow: -5px 0px 30px rgba(0,0,0,1);"></div>
  <ul>
    <li>
      <li><?php echo \Lobby::l("/mods", "<h4 style='padding-top: 0;'>Modules</h4>", 'class="head"');?></li>
      <ul>
        <li><?php echo \Lobby::l("/mods/admin", "Admin");?></li>
        <li><?php echo \Lobby::l("/mods/indi", "Indi");?></li>
      </ul>
    </li>
  </ul>
</div>
<div class="contents">
  <?php
  require_once APP_DIR . "/src/inc/Parsedown.php";
  $Parsedown = new ParsedownExtra();
  $content = file_get_contents($mod_path);
  echo $Parsedown->text($content);
  ?>
</div>
<script type="text/javascript" src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=sunburst"></script>
<script>
  $(document).ready(function(){
    $("pre").each(function(){
      $(this).addClass("prettyprint linenums");
    });
  });
</script>
<style>
li.L0, li.L1, li.L2, li.L3, li.L5, li.L6, li.L7, li.L8{
  list-style-type: decimal !important;
}
</style>
<?php
require_once APP_DIR . "/src/inc/views/track.php";
