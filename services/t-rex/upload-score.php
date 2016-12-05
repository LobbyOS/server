<?php
require_once __DIR__ . "/../../load.php";

$lid = Request::postParam("lid");
$name = Request::postParam("name");
$score = Request::postParam("score");

if(strlen($lid) === 45 && $name != null && is_numeric($score) && $score > 60){
  $sth = Lobby\DB::getDBH()->prepare("INSERT INTO `t_rex_scores` (`lid`, `name`, `score`, `uploaded`) VALUES(:lid, :name, :score, NOW()) ON DUPLICATE KEY UPDATE `score` = :score, `name` = :name, `uploaded` = NOW()");

  $name = htmlspecialchars($name);
  $truncatedName = (strlen($name) > 20) ? substr($name, 0, 20) . '...' : $name;

  $sth->bindValue(":lid", $lid);
  $sth->bindValue(":name", $truncatedName);
  $sth->bindValue(":score", $score);

  $sth->execute();
}