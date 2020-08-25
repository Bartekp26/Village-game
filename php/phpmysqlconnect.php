<?php
  require "dbconfig.php";

  try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $dbusername, $dbpassword);
    echo "Connected to $dbname at $host successfully.";
  } catch (PDOException $e) {
    exit("Could not connect to the database $dbname :" . $e->getMessage());
  }
