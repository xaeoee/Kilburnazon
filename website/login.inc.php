<?php
session_start();
if (isset($_POST["login"])) {

  $eid = $_POST["eid"];
  $password = $_POST["password"];

  include "dbh.php";
  include "login.class.php";
  include "login.controller.php";
  $login = new LoginController($eid, $password);
  $login->login();

  header("location: index.php");
}
