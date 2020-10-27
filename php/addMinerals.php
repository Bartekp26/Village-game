<?php
  session_start();

  if($_SESSION["logged"]){
    $user_id = $_SESSION["id"];
    require "phpmysqlconnect.php";

    $query = "SELECT last_update FROM villages WHERE owner_id = $user_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $lastUpdate = $stmt->fetch(PDO::FETCH_ASSOC)["last_update"];

    $LastUpdateDate = new DateTime($lastUpdate);
    $PresentDate = new DateTime();

    $diff = $PresentDate->diff($LastUpdateDate);
    $interval = (((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s)/3600;

    $query = "SELECT sawmill,stone_mine,clay_mine FROM villages WHERE owner_id = $user_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $levels = $stmt->fetch(PDO::FETCH_ASSOC);

    $query2 = "SELECT production FROM buildings_costs";
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute();
    $production = $stmt2->fetchall(PDO::FETCH_NUM);

    $sawmill_production = round($production[$levels['sawmill']-1][0]*$interval);
    $stone_mine_production = round($production[$levels['stone_mine']-1][0]*$interval);
    $clay_mine_production = round($production[$levels['clay_mine']-1][0]*$interval);

    $query = "SELECT wood, stone, clay FROM villages WHERE owner_id = $user_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $minerals = $stmt->fetch(PDO::FETCH_ASSOC);

    $wood = $minerals["wood"] + $sawmill_production;
    $stone = $minerals["stone"] + $stone_mine_production;
    $clay = $minerals["clay"] + $clay_mine_production;
    
    $now = $PresentDate->format('Y-m-d H:i:s');

    $query = "UPDATE villages SET last_update = CURRENT_TIMESTAMP() WHERE owner_id = $user_id";
    $pdo->prepare($query)->execute();

    $query = "UPDATE villages SET wood = $wood, stone = $stone, clay = $clay WHERE owner_id = $user_id";
    $pdo->prepare($query)->execute();

    header("Location: home.php");
  } else header("Location: ../index.php");
?>