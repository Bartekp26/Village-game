<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require "../templates/head.html"; ?>
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <body>
    <?php require "../templates/header.html"; ?>
    <main>
        <div class="form_container">
          <form class="form" method="post">
            <input class="form__input" type="text" name="username" placeholder="Username">
            <input class="form__input" type="email" name="email" placeholder="Email">
            <input class="form__input" type="password" name="password" placeholder="Password">
            <input class="form__input" type="password" name="repeat password" placeholder="Repeat password">
            <input class="form__submit" type="submit" name="submit" value="Sign up">
            <p class="error"></p>
          </form>
          <p class="sign">Have an account already? <a class="sign__link" href="../index.php">Sign in</a></p>
        </div>
    </main>

    <?php require "../templates/foot.html"; ?>
  </body>
</html>
