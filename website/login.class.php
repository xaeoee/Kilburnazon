<?php

class Login extends Dbh
{

  protected function getEmp($empId, $password)
  {
    $stmt = $this->connect()->prepare("SELECT emp_password FROM manager WHERE emp_id = ?");

    if (!$stmt->execute(array($empId))) {
      $stmt = null;
      header("location: login.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      echo '<script>alert("User not found"); window.location.href = "login.php?error=userNotFound";</script>';
      exit();
    }

    $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkingPassword = password_verify($password, $hashedPassword[0]["emp_password"]);

    if ($checkingPassword == false) {
      $stmt = null;
      echo '<script>alert("Wrong password entered"); window.location.href = "login.php?error=wrongPasswordEntered";</script>';
      exit();
    } elseif ($checkingPassword == true) {
      $stmt = $this->connect()->prepare("SELECT * FROM manager WHERE emp_id = ? AND emp_password = ?");

      if (!$stmt->execute(array($empId, $hashedPassword[0]["emp_password"]))) {
        $stmt = null;
        header("location: login.php?error=stmtfailed");
        exit();
      }

      if ($stmt->rowCount() == 0) {
        $stmt = null;
        echo '<script>alert("User not found"); window.location.href = "login.php?error=userNotFound";</script>';
        exit();
      }

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["eid"] = $user[0]["emp_id"];
      $_SESSION["password"] = $user[0]["emp_password"];

      $stmt = null;
    }
  }
}
