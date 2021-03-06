<?php
  session_start();
  require "phpmysqlconnect.php";

  if(isset($_POST["submit"])){
    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");

    $query = "SELECT id,password FROM users WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array($username));
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
      $_SESSION["logged"] = true;
      $_SESSION["id"] = $user["id"];
      unset($_SESSION["incorrect"]);
      header("Location: addMinerals.php");
    } else {
      $_SESSION["incorrect"] = "Incorrect username or password";
      header("Location: ../index.php");
    }

  } else {
    header("Location: ../index.php");
  }
