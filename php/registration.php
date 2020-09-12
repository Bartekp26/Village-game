<?php
  session_start();
  if(isset($_POST["submit"])){
    $flag = true;
    $username = filter_input(INPUT_POST, "username");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $repeatPassword = filter_input(INPUT_POST, "repeat-password");

    # Passwords validation
    if(!empty($password)){
      if(strlen($password) < 8){
        $flag = false;
        $error = "Password must be minimum 8 chars long";
      } elseif(!preg_match("#[0-9]+#",$password)) {
        $flag = false;
        $error = "Password must contain at least 1 number";
      } elseif(!preg_match("#[A-Z]+#",$password)) {
        $flag = false;
        $error = "Password must contain at least 1 capital";
      } elseif(!preg_match("#[a-z]+#",$password)) {
        $flag = false;
        $error = "Password must contain at least 1 lowercase";
      } elseif(!($password === $repeatPassword)){
        $flag = false;
        $error = "Passwords don't match";
      }
    } else {
      $flag = false;
      $error = "Enter a password";
    }

    # Email validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $flag = false;
      $error = "Enter a valid email";
    }

    # Username validation
    if(!preg_match("/^[A-Za-z0-9]{4,24}$/", $username)){
      $flag = false;
      $error = "Username must be alphanumeric &<br>4 to 24 chars long";
    }

    if($flag){
      $username = htmlspecialchars($username);
      $email = htmlspecialchars($email);
      $password = htmlspecialchars($password);
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      require "phpmysqlconnect.php";

      $query = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
      $stmt = $pdo->prepare($query)->execute([$username,$email,$hashedPassword]);

      header("Location: ../index.php");
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require "../templates/head.html"; ?>
<link rel="stylesheet" href="../css/index.css">
<script defer src="../js/validation.js"></script>
</head>
<body>
  <?php require "../templates/header.html"; ?>
  <main>
    <div class="form_container">
      <form class="form" method="post" action="registration.php">
          <input class="form__input" type="text" name="username" placeholder="Username">
          <input class="form__input" type="email" name="email" placeholder="Email"> 
          <input class="form__input" type="password" name="password" placeholder="Password">
          <input class="form__input" type="password" name="repeat-password" placeholder="Repeat password">
          <input class="form__submit" type="submit" name="submit" value="Sign up" formnovalidate>
          <p class="error"><?= isset($error) ? $error : ""; ?></p>
        </form>
      <p class="sign">Have an account already? <a class="sign__link" href="../index.php">Sign in</a></p>
    </div>
  </main>

  <?php require "../templates/foot.html"; ?>
</body>
</html>
