<?php

class LoginController extends Login
{

  private $empId;
  private $password;

  public function __construct($empId, $password)
  {
    $this->empId = $empId;
    $this->password = $password;
  }

  public function login()
  {
    if ($this->checkEmptyInput() == false) {
      echo '<script>alert("Please fill all the forms"); window.location.href = "login.php?error=emptyInput";</script>';
      exit();
    }

    if ($this->idInValidForm() == false) {
      echo '<script>alert("User ID in inappropriate form"); window.location.href = "login.php?error=userIdInInappropriateForm";</script>';
      exit();
    }
    $this->getEmp($this->empId, $this->password);
  }

  private function idInValidForm()
  {
    $result = true;
    $pattern = '/^\d{2}-\d{7}$/';

    if (preg_match($pattern, $this->empId)) {
      $result = true;
    } else {
      $result = false;
    }

    return $result;
  }



  private function checkEmptyInput()
  {
    $result = true;
    if (empty($this->empId) || empty($this->password)) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }
}
