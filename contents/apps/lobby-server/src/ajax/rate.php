<?php
require_once $this->dir . "/src/inc/logsys.php";

if(\Fr\LS2::$loggedIn && isset($_POST['id']) && isset($_POST['rating']) && substr($_POST['id'], 0, 4) == "app-"){  
  require_once $this->dir . "/src/inc/Fr.star.php";
  
  $star = new \Fr\Star(array(), $_POST['id']);
  $star->addRating(\Fr\LS2::$user, $_POST['rating']);
  
  echo $star->getRating("ableToRate");
  echo "<div id='rating'></div>";
}else{
  echo "error";
}
