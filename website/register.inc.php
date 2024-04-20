<?php

if (isset($_POST["register"])) {

  $eid = $_POST["eid"];
  $password = $_POST["password"];

  include "dbh.php";
  include "register.class.php";
  include "register.controller.php";
  $register = new RegisterController($eid, $password);
  $register->register();

  echo '<script>alert("You are now registered"); window.location.href = "login.php";</script>';
}
