<?php
$docs_location = APP_DIR . "/src/data/docs/";
$docs = array_diff(scandir($docs_location), array('..', '.'));
array_filter($docs, function(&$key){
  $key = str_replace('.md', '', $key);
});

$doc = isset($doc) ? $doc : "index";
if(isset($doc) && array_search($doc, $docs) !== false){
  $doc_path = "$docs_location/$doc.md";
  
  $f = fopen($doc_path, 'r');
  $doc_name = fgets($f);
  $content = fread($f, filesize($doc_path));
  fclose($f);
  
  if($doc === "index"){
    \Lobby::setTitle("Documentation");
  }else{
    if(substr($doc, 0, 4) == "dev."){
      $doc = substr_replace($doc, '', 0, 4);
      \Lobby::setTitle($doc_name . " | Developer Docs");
    }else{
      \Lobby::setTitle($doc_name . " | Docs");
    }
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
      <?php echo \Lobby::l("/docs", "Preface", 'class="head"');?>
      <ul>
        <li><?php echo "<a href='". L_URL ."/docs/about'>About</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/contact'>Contact</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/quick'>Quickstart</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/config'>Configuration</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/install-app'>Install Apps</a>";?></li>
      </ul>
    </li>
    <li>
      <?php echo \Lobby::l("/docs/dev", "Developer", 'class="head"');?>
      <ul>
        <li><?php echo "<a href='". L_URL ."/docs/dev/introduction'>Introduction</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/dev/create-app'>Creating Apps</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/dev/debug'>Debugging</a>";?></li>
      </ul>
    </li>
    <li>
      <?php echo \Lobby::l("/docs/dev/app", "App", 'class="head"');?>
      <ul>
        <li><?php echo "<a href='". L_URL ."/docs/dev/app/manifest.json'>Manifest File</a>";?></li>
        <li><?php echo "<a href='". L_URL ."/docs/dev/app/App.php'>App.php</a>";?></li>
      </ul>
    </li>
  </ul>
</div>
<div class="contents">
  <?php
  require_once APP_DIR . "/src/inc/Parsedown.php";
  $Parsedown = new ParsedownExtra();
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
