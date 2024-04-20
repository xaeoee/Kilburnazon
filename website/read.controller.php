<?php
class ReadController extends Read
{

  private $empId;
  private $name;
  private $address;
  private $salary;
  private $dob;
  private $nin;
  private $department;
  private $emergency_name;
  private $emergency_relationship;
  private $emergency_phone;
  private $manager_name;

  public function __construct($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name)
  {
    $this->empId = $empId;
    $this->name = $name;
    $this->address = $address;
    $this->salary = $salary;
    $this->dob = $dob;
    $this->nin = $nin;
    $this->department = $department;
    $this->emergency_name = $emergency_name;
    $this->emergency_relationship = $emergency_relationship;
    $this->emergency_phone = $emergency_phone;
    $this->manager_name = $manager_name;
  }

  public function read()
  {

    if ($this->idInValidForm() == false) {
      echo '<script>alert("User ID in inappropriate form"); window.location.href = "read.php?error=userIdInInappropriateForm";</script>';
      exit();
    }

    if ($this->checkEmployeeName() == false) {
      echo '<script>alert("Employee name not in appropriate form"); window.location.href = "read.php?error=employeeNameInappropriateForm";</script>';
      exit();
    }

    if ($this->checkAdress() == false) {
      echo '<script>alert("Employee address not in appropriate form"); window.location.href = "read.php?error=employeeAddressInappropriateForm";</script>';
      exit();
    }

    if ($this->checkSalary() == false) {
      echo '<script>alert("Employee salary not in appropriate form"); window.location.href = "read.php?error=employeeSalaryInappropriateForm";</script>';
      exit();
    }

    if ($this->checkDOB() == false) {
      echo '<script>alert("Employee DOB not in appropriate form"); window.location.href = "read.php?error=employeeDOBInappropriateForm";</script>';
      exit();
    }

    if ($this->checkNIN() == false) {
      echo '<script>alert("Employee NIN not in appropriate form"); window.location.href = "read.php?error=employeeNINInappropriateForm";</script>';
      exit();
    }

    if ($this->checkDepartment() == false) {
      echo '<script>alert("Employee Department not in appropriate form"); window.location.href = "read.php?error=employeeDepartmentInappropriateForm";</script>';
      exit();
    }

    if ($this->checkEmergencyName() == false) {
      echo '<script>alert("Emergency contact name not in appropriate form"); window.location.href = "read.php?error=emergencyContactNameInappropriateForm";</script>';
      exit();
    }

    if ($this->checkEmergencyRelationship() == false) {
      echo '<script>alert("Emergency contact relationship not in appropriate form"); window.location.href = "read.php?error=emergencyContactRelationshipInappropriateForm";</script>';
      exit();
    }

    if ($this->checkEmergencyPhoneNumber() == false) {
      echo '<script>alert("Emergency contact phone number not in appropriate form"); window.location.href = "read.php?error=emergencyContactPhoneNumberInappropriateForm";</script>';
      exit();
    }

    if ($this->checkManagerName() == false) {
      echo '<script>alert("Manager name not in appropriate form"); window.location.href = "read.php?error=ManagerNameInappropriateForm";</script>';
      exit();
    }

    return $this->readEmp($this->empId, $this->name, $this->address, $this->salary, $this->dob, $this->nin, $this->department, $this->emergency_name,  $this->emergency_relationship, $this->emergency_phone, $this->manager_name);
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

  private function checkEmployeeName()
  {
    $result = true;
    $pattern = '/^[a-zA-Z\s]*$/';;

    if (preg_match($pattern, $this->name)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkAdress()
  {
    $result = true;
    $pattern = '/^([a-zA-Z0-9\s]*)$/';


    if (preg_match($pattern, $this->address)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkSalary()
  {
    $result = true;
    $pattern = '/^(£[\d,.]*)?$/';

    if (preg_match($pattern, $this->salary)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkDOB()
  {
    $result = true;
    $pattern = '~^(?:0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/([0-9]{4})$|^$~';



    if (preg_match($pattern, $this->dob)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkNIN()
  {
    $result = true;
    $pattern = '/^(?:[a-zA-Z]{2}\d{6}[a-zA-Z]?)?$/';


    if (preg_match($pattern, $this->nin)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkDepartment()
  {
    $result = true;
    $pattern = '/^(HR|Driver|Packager|Manager)?$/';

    if (preg_match($pattern, $this->department)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkEmergencyName()
  {
    $result = true;
    $pattern = '/^([a-zA-Z\s]*)$/';

    if (preg_match($pattern, $this->emergency_name)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkEmergencyRelationship()
  {
    $result = true;
    $pattern = '/^[a-zA-Z\s]*$/';

    if (preg_match($pattern, $this->emergency_relationship)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkEmergencyPhoneNumber()
  {
    $result = true;
    $pattern = '/^(\d{5}\s\d{3}\s\d{3})?$/';


    if (preg_match($pattern, $this->emergency_phone)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }

  private function checkManagerName()
  {
    $result = true;
    $pattern = '/^[a-zA-Z\s]*$/';

    if (preg_match($pattern, $this->manager_name)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }
}
