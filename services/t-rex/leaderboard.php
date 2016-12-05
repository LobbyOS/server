<?php
require_once __DIR__ . "/../../load.php";

$lid = Request::postParam("lid");

if(strlen($lid) === 45){
  $sth = Lobby\DB::getDBH()->prepare("(SELECT `name`, `score`, `uploaded`, `lid` FROM `t_rex_scores` ORDER BY `score` DESC LIMIT 10) UNION (SELECT `name`, `score`, `uploaded`, `lid` FROM `t_rex_scores` WHERE `lid` = ?)");
  $sth->execute(array($lid));
  
  echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
}