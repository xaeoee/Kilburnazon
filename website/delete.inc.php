<?php
session_start();
if (isset($_POST["delete"])) {

  $empId = $_POST["eid"];

  include "dbh.php";
  include "delete.class.php";
  include "delete.controller.php";

  $create = new DeleteController($empId);
  $create->delete();

  echo '<script>alert("Employee information has been deleted"); window.location.href = "index.php";</script>';
}
