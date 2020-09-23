<?php
  session_start();

  if($_SESSION["logged"]){
    //echo 1;
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
        <li class="menu__item">Home</li>
        <li class="menu__item">Town hall</li>
      </ul>
      <button class="menu__logout">Log out</button>
    </div>
  </nav>
  <div class="materials">
    <div class="wood"></div>
    <div class="stone"></div>
    <div class="clay"></div>
  </div>

  <?php require "../templates/foot.html"; ?>
</body>
</html>