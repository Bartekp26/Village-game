<?php
  session_start();

  if($_SESSION["logged"]){
    $user_id = $_SESSION["id"];
  } else {
    header("Location: ../index.php");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require "../templates/head.html"; ?>
    <link rel="stylesheet" href="../css/index.css">
  </head>
<body>
  <nav class="navigation">
    <div class="menu">
      <h3 class="logo">Village Game</h2>
      <ul class="menu__list">
        <?php
          $currentPage = basename($_SERVER['SCRIPT_FILENAME']);
          $menuList=array(
            'Home' => 'game.php',
            'Town hall' => 'townhall.php',
          );   
      
          foreach ($menuList as $title => $url) {
            echo "<li class='menu__item'><a href='{$url}'", ($currentPage==$url) ? "class='active'" : "", ">{$title}</a></li>";
          }
        ?>
      </ul>
      <form action="logout.php" method="post">
        <button type="submit" class="menu__logout">Log out</button>
      </form>
    </div>
  </nav>
  <div class="minerals">
    <?php
        require "phpmysqlconnect.php";

        $query = "SELECT wood, stone, clay FROM villages WHERE owner_id = $user_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $minerals = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach($minerals as $mineral => $amount){
          echo "<div class='mineral'>$amount <img class='$mineral mineral__icon' src='../assets/icons/$mineral.png'/></div>";
        }
      ?>
  </div>

  <?php require "../templates/foot.html"; ?>
</body>
</html>