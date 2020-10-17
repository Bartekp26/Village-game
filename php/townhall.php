<?php require("game.php"); ?>
<div class="townhall">
  <h2 class="townhall__title">Town hall</h2>
  <div class="buildings_container">
    <?php   
      require "phpmysqlconnect.php";

      $query = "SELECT town_hall,sawmill,stone_mine,clay_mine FROM villages WHERE owner_id = $user_id";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      $levels = $stmt->fetch(PDO::FETCH_ASSOC);

      $query2 = "SELECT cost FROM buildings_costs";
      $stmt2 = $pdo->prepare($query2);
      $stmt2->execute();
      $costs = $stmt2->fetchall(PDO::FETCH_NUM);

      // Check if user have enough minerals to buy
      $query3 = "SELECT wood, stone, clay FROM villages WHERE owner_id = $user_id";
      $stmt3 = $pdo->prepare($query3);
      $stmt3->execute();
      $minerals = $stmt3->fetch(PDO::FETCH_ASSOC);
          
      foreach($levels as $building => $level){
        $cost = $costs[$level][0];
        $level++;

        echo "<div class='building'>
                <div class='building__title'>".ucfirst($building)."</div>
                <div class='building__level'>$level lvl</div>
                <div class='building__cost mineral'>$cost 
                  <img class='mineral__icon mineral__icon--margin' src='../assets/icons/wood.png'/>
                  <img class='mineral__icon mineral__icon--margin' src='../assets/icons/stone.png'/>
                  <img class='mineral__icon mineral__icon--margin' src='../assets/icons/clay.png'/>
                </div>";

        if(($cost <= $minerals["wood"]) && ($cost <= $minerals["stone"]) && ($cost <= $minerals["clay"])){
          echo "<a href='buy.php?building=$building' class='building__button'>Buy</a>";
        } else {
          echo "<a href='buy.php?building=$building' class='building__button building__button--not-available'>Buy</a>";
        }

        if(isset($_SESSION[$building."-error"])){
          echo "<div class='building__error'>{$_SESSION[$building.'-error']}</div>";
        }
        echo "</div>";

        unset($_SESSION["$building-error"]);
      }
    ?>
  </div>  
</div>