<?php
  if($_SESSION["logged"]){
    session_start();
    session_destroy();
    header("Location: ../index.php");
  } else {
    header("Location: ../index.php");
  }