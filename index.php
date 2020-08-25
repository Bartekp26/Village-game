<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require "templates/head.html"; ?>
  <body>
    <main>
        <div class="form_container">
          <form class="form" action="login.php" method="post">
            <input class="form__input" type="text" name="login" placeholder="Login">
            <input class="form__input" type="password" name="password" placeholder="Password">
            <input class="form__submit" type="submit" name="submit" value="Sign in">
          </form>
          <p class="sign">Don't have an account? <a class="sign__link" href="#">Sign up</a></p>
        </div>
    </main>

    <script src="index.js" charset="utf-8"></script>
  </body>
</html>
