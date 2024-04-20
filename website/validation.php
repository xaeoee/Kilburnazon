<?php

function validityChecking($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name)
{
  if (checkEmptyInput($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name) == false) {
    echo '<script>alert("Please fill all the forms"); window.location.href = "update.php?error=emptyInput";</script>';
    exit();
  }

  if (idInValidForm($empId) == false) {
    echo '<script>alert("User ID in inappropriate form"); window.location.href = "update.php?error=userIdInInappropriateForm";</script>';
    exit();
  }

  if (checkEmployeeName($name) == false) {
    echo '<script>alert("Employee name not in appropriate form"); window.location.href = "update.php?error=employeeNameInappropriateForm";</script>';
    exit();
  }

  if (checkAdress($address) == false) {
    echo '<script>alert("Employee address not in appropriate form"); window.location.href = "update.php?error=employeeAddressInappropriateForm";</script>';
    exit();
  }

  if (checkSalary($salary) == false) {
    echo '<script>alert("Employee salary not in appropriate form"); window.location.href = "update.php?error=employeeSalaryInappropriateForm";</script>';
    exit();
  }

  if (checkDOB($dob) == false) {
    echo '<script>alert("Employee DOB not in appropriate form"); window.location.href = "update.php?error=employeeDOBInappropriateForm";</script>';
    exit();
  }

  if (checkNIN($nin) == false) {
    echo '<script>alert("Employee NIN not in appropriate form"); window.location.href = "update.php?error=employeeNINInappropriateForm";</script>';
    exit();
  }

  if (checkDepartment($department) == false) {
    echo '<script>alert("Employee Department not in appropriate form"); window.location.href = "update.php?error=employeeDepartmentInappropriateForm";</script>';
    exit();
  }

  if (checkEmergencyName($emergency_name) == false) {
    echo '<script>alert("Emergency contact name not in appropriate form"); window.location.href = "update.php?error=emergencyContactNameInappropriateForm";</script>';
    exit();
  }

  if (checkEmergencyRelationship($emergency_relationship) == false) {
    echo '<script>alert("Emergency contact relationship not in appropriate form"); window.location.href = "update.php?error=emergencyContactRelationshipInappropriateForm";</script>';
    exit();
  }

  if (checkEmergencyPhoneNumber($emergency_phone) == false) {
    echo '<script>alert("Emergency contact phone number not in appropriate form"); window.location.href = "update.php?error=emergencyContactPhoneNumberInappropriateForm";</script>';
    exit();
  }

  if (checkManagerName($manager_name) == false) {
    echo '<script>alert("Manager name not in appropriate form"); window.location.href = "update.php?error=emergencyContactPhoneNumberInappropriateForm";</script>';
    exit();
  }
}

function idInValidForm($empId)
{
  $result = true;
  $pattern = '/^\d{2}-\d{7}$/';

  if (preg_match($pattern, $empId)) {
    $result = true;
  } else {
    $result = false;
  }

  return $result;
}

function checkEmployeeName($name)
{
  $result = true;
  $pattern = '/^[a-zA-Z\s]+$/';

  if (preg_match($pattern, $name)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkAdress($address)
{
  $result = true;
  $pattern = '/^[a-zA-Z0-9\s]+$/';

  if (preg_match($pattern, $address)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkSalary($salary)
{
  $result = true;
  $pattern = '/^£[\d,.]+$/';

  if (preg_match($pattern, $salary)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkDOB($dob)
{
  $result = true;
  $pattern = '~^(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/([0-9]{4})$~';

  if (preg_match($pattern, $dob)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkNIN($nin)
{
  $result = true;
  $pattern = '/^[a-zA-Z]{2}\d{6}[a-zA-Z]$/';

  if (preg_match($pattern, $nin)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkDepartment($department)
{
  $result = true;
  $pattern = '/^(HR|Driver|Packager|Manager)$/';

  if (preg_match($pattern, $department)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkEmergencyName($emergency_name)
{
  $result = true;
  $pattern = '/^[a-zA-Z\s]+$/';

  if (preg_match($pattern, $emergency_name)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkEmergencyRelationship($emergency_relationship)
{
  $result = true;
  $pattern = '/^[a-zA-Z\s]+$/';

  if (preg_match($pattern, $emergency_relationship)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkEmergencyPhoneNumber($emergency_phone)
{
  $result = true;
  $pattern = '/^\d{5}\s\d{3}\s\d{3}$/';

  if (preg_match($pattern, $emergency_phone)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkManagerName($manager_name)
{
  $result = true;
  $pattern = '/^[a-zA-Z\s]+$/';

  if (preg_match($pattern, $manager_name)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function checkEmptyInput($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name)
{
  $result = true;
  if (empty($empId) || empty($name) || empty($address) || empty($salary) || empty($dob) || empty($nin) || empty($department) || empty($emergency_name) || empty($emergency_relationship) || empty($emergency_phone) || empty($manager_name)) {
    $result = false;
  }
  return $result;
}
