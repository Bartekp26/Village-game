<?php require("game.php");?>
<div class="table">
  <h2 class="table__title">Village Informations</h2>
  <div class="informations">
    <?php
      $query = "SELECT username, email, created_date FROM users WHERE id = $user_id";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      $user_informations = $stmt->fetch(PDO::FETCH_ASSOC);

      echo "<div class='informations__container'><div class='information'>Username: <span class='information__span'>{$user_informations['username']}</span></div><div class='information'>Email: <span class='information__span'>{$user_informations['email']}</span></div><div class='information'>Created at: <span class='information__span'>{$user_informations['created_date']}</span></div></div>";

      $query = "SELECT town_hall, sawmill, stone_mine, clay_mine FROM villages WHERE owner_id = $user_id";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
      $levels = $stmt->fetch(PDO::FETCH_ASSOC);

      echo "<div class='informations__container'><div class='information'>Town hall: <span class='information__span'>{$levels['town_hall']} level</span></div><div class='information'>Sawmill: <span class='information__span'>{$levels['sawmill']} level</span></div>
      <div class='information'>Stone mine: <span class='information__span'>{$levels['stone_mine']} level</span></div>
      <div class='information'>Clay mine: <span class='information__span'>{$levels['clay_mine']} level</span></div></div>";

    ?>
  </div>
</div>



  <div class="information">Username - </div>
  <div class="information">Email - </div>
  <div class="information">Created at - </div>