<?php

try{
require_once 'Game.php';

$pdo= new PDO('mysql:host=localhost;port=3308;dbname=play_games', 'root', '');
$page= $_GET['page'] ?? 1;
$gamesPerPage = 5;
$start = ($page - 1) * $gamesPerPage;
$sql= ('SELECT * FROM games LIMIT :start, :gamesPerPage');
$pdoStatement= $pdo->prepare($sql);
$pdoStatement->bindValue(':start',$start, PDO::PARAM_INT);
$pdoStatement->bindValue(':gamesPerPage', $gamesPerPage , PDO::PARAM_INT);
if($pdoStatement->execute()){
    while($user = $pdoStatement->fetchObject('Game')){
         echo $user->getFullGameDescription();
    }
}else{
   $errorInfo = $pdoStatement->errorInfo();
     echo $errorInfo[2];
}
  $countStatement = $pdo->prepare('SELECT COUNT(*) AS totalUsers FROM games');
  if($countStatement->execute()){
      $totalUsers = $countStatement->fetch(PDO::FETCH_ASSOC);
    $pageNumber = ceil($totalUsers['totalUsers'] / $gamesPerPage);
       for($i = 1; $i <= $pageNumber; $i++){
         echo '<a href="?page='. $i . '">'. $i .'</a> -';
      }
       }else{
        $errorInfo = $countStatement->errorInfo();
        echo $errorInfo[2];
      }
    }catch(PDOException $e){
          echo "impossible de se connecter à la base de données";
  }

 ?>


  