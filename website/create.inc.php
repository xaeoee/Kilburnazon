<?php
session_start();
if (isset($_POST["create"])) {

  $empId = $_POST["eid"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $salary = $_POST["salary"];
  $dob = $_POST["dob"];
  $nin = $_POST["nin"];
  $department = $_POST["department"];
  $emergency_name = $_POST["emergency_name"];
  $emergency_relationship = $_POST["emergency_relationship"];
  $emergency_phone = $_POST["emergency_phone"];

  include "dbh.php";
  include "create.class.php";
  include "create.controller.php";

  $create = new CreateController($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone);
  $create->create();

  echo '<script>alert("Employee information has been added to the database"); window.location.href = "index.php";</script>';
}
