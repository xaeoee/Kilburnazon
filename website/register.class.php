<?php

class Register extends Dbh
{

  protected function setEmp($empId, $password)
  {
    $stmt = $this->connect()->prepare("INSERT INTO manager(`emp_id`, `emp_password`) VALUES (?, ?)");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if (!$stmt->execute(array($empId, $hashedPassword))) {
      $stmt = null;
      header("location: register.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }

  protected function validityCheck($empId)
  {
    $stmt = $this->connect()->prepare("SELECT emp_id FROM manager WHERE emp_id = ?");

    if (!$stmt->execute(array($empId))) {
      $stmt = null;
      header("location: register.php?error=stmtfailed");
      exit();
    }

    $result = true;
    if ($stmt->rowCount() > 0) {
      $result = false;
    } else {
      $result = true;
    }

    return $result;
  }

  protected function managerCheck($empId)
  {
    $stmt = $this->connect()->prepare("SELECT department FROM employees WHERE emp_id = ?");

    if (!$stmt->execute(array($empId))) {
      $stmt = null;
      header("location: register.php?error=stmtfailed");
      exit();
    }

    $result = false;

    if ($stmt->rowCount() > 0) {
      $department = $stmt->fetchColumn();
      if ($department === "HR") {
        $result = true;
      }
    }

    return $result;
  }
}
