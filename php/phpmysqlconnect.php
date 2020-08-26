<?php
  require "dbconfig.php";

  try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $dbusername, $dbpassword, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "Connected to $dbname at $host successfully.";
  } catch (PDOException $e) {
    exit("Could not connect to the database $dbname :" . $e->getMessage());
  }
