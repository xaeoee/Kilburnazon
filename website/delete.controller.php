<?php

class DeleteController extends Delete
{
  private $empId;

  public function __construct($empId)
  {
    $this->empId = $empId;
  }

  public function delete()
  {
    if ($this->idInValidForm() == false) {
      echo '<script>alert("User ID in inappropriate form"); window.location.href = "delete.php?error=userIdInInappropriateForm";</script>';
      exit();
    }

    if ($this->checkEmptyInput() == false) {
      echo '<script>alert("Please fill all the forms"); window.location.href = "delete.php?error=emptyInput";</script>';
      exit();
    }
    $this->deleteEmp($this->empId);
  }

  private function idInValidForm()
  {
    $result = true;
    $pattern = '/^(\d{2}-\d{7})?$/';

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
    if (empty($this->empId)) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }
}
