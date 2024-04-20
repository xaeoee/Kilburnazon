<?php

class RegisterController extends Register
{

  private $empId;
  private $password;

  public function __construct($empId, $password)
  {
    $this->empId = $empId;
    $this->password = $password;
  }

  public function register()
  {
    if ($this->checkEmptyInput() == false) {
      echo '<script>alert("Please fill all the forms"); window.location.href = "register.php?error=emptyInput";</script>';
      exit();
    }
    if ($this->checkIdValid() == false) {
      echo '<script>alert("User ID has been taken"); window.location.href = "register.php?error=userIdTaken";</script>';
      exit();
    }

    if ($this->idInValidForm() == false) {
      echo '<script>alert("User ID in inappropriate form"); window.location.href = "register.php?error=userIdInInappropriateForm";</script>';
      exit();
    }

    if ($this->checkIfManager() == false) {
      echo '<script>alert("You must be a manager to register"); window.location.href = "register.php?error=userIdNotManagerId";</script>';
      exit();
    }

    $this->setEmp($this->empId, $this->password);
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


  private function checkIdValid()
  {
    $result = true;
    if (!$this->validityCheck($this->empId)) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }

  private function checkIfManager()
  {
    $result = true;
    if (!$this->managerCheck($this->empId)) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }
}
