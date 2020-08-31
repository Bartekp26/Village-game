<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require "templates/head.html"; ?>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <?php require "templates/header.html"; ?>
    <main>
        <div class="form_container">
          <form class="form" action="php/login.php" method="post">
            <input class="form__input" type="text" name="username" placeholder="Username">
            <input class="form__input" type="password" name="password" placeholder="Password">
            <input class="form__submit" type="submit" name="submit" value="Sign in">
            <p class="error"><?php if(isset($_SESSION["incorrect"])){
              echo $_SESSION["incorrect"];
              unset($_SESSION["incorrect"]);} ?>
            </p>
          </form>
          <p class="sign">Don't have an account? <a class="sign__link" href="php/registration.php">Sign up</a></p>
        </div>
    </main>

    <?php require "templates/foot.html"; ?>
</html>
