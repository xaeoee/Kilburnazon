<?php
$dsn = "mysql:host=localhost:3307;dbname=coursework2";
$username = "root";
$password = "";

try {
  $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  $error_message = $e->getMessage();
  echo $error_message;
  exit();
}
