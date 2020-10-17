<?php
  session_start();

  if($_SESSION["logged"]){
    $building = htmlspecialchars($_GET["building"]);
    if(($building == "town_hall") || ($building == "sawmill") || ($building  == "stone_mine") || ($building == "clay_mine")){
      require "phpmysqlconnect.php";
      $user_id = $_SESSION["id"];

      $query = "SELECT wood, stone, clay FROM villages WHERE owner_id = $user_id";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      $minerals = $stmt->fetch(PDO::FETCH_ASSOC);

      $query2 = "SELECT $building FROM villages WHERE owner_id = $user_id";
      $stmt2 = $pdo->prepare($query2);
      $stmt2->execute();
      $actual_level = $stmt2->fetch();
      $actual_level = $actual_level[$building];
      $next_level = $actual_level + 1;

      $query3 = "SELECT cost FROM mines_costs WHERE lvl = $next_level";
      $stmt3 = $pdo->prepare($query3);
      $stmt3->execute();
      $cost = $stmt3->fetch();
      $cost = $cost[0];

      if(($cost <= $minerals["wood"]) && ($cost <= $minerals["stone"]) && ($cost <= $minerals["clay"])){
        $wood = $minerals["wood"] - $cost;
        $stone = $minerals["stone"] - $cost;
        $clay = $minerals["clay"] - $cost;

        $query = "UPDATE villages SET wood = $wood, stone = $stone, clay = $clay WHERE owner_id = $user_id";
        $pdo->prepare($query)->execute();
        
        $query2 = "UPDATE villages SET $building = $next_level WHERE owner_id = $user_id";
        $pdo->prepare($query2)->execute();

        header("Location: townhall.php");
      } else {
        $_SESSION["$building-error"] = "You don't have enough minerals!";
        header("Location: townhall.php");
      }
    } else header("Location: townhall.php");
  } else header("Location: ../index.php");
?>