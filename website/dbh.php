<?php

class Dbh
{
  public function connect()
  {
    try {
      $username = "root";
      $password = "";
      $dsn = "mysql:host=localhost:3307;dbname=coursework2";
      $pdo = new PDO($dsn, $username, $password);
      return $pdo;
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      echo $error_message;
      exit();
    }
  }
}
