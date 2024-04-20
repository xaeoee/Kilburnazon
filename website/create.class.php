<?php
class Create extends Dbh
{
  protected function setEmp($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone)
  {
    $managerName = $this->getEmployeeName($_SESSION['eid']);

    $stmt = $this->connect()->prepare("INSERT INTO employees(`emp_id`, `name`, `address`, `salary`, `dob`, `nin`, `department`, `emergency_name`, `emergency_relationship`, `emergency_phone`, `manager_name`) VALUES (:empId, :name, :address, :salary, :dob, :nin, :department, :emergency_name, :emergency_relationship, :emergency_phone, :manager_name)");

    if (!$stmt->execute([
      'empId' => $empId,
      'name' => $name,
      'address' => $address,
      'salary' => $salary,
      'dob' => $dob,
      'nin' => $nin,
      'department' => $department,
      'emergency_name' => $emergency_name,
      'emergency_relationship' => $emergency_relationship,
      'emergency_phone' => $emergency_phone,
      'manager_name' => $managerName
    ])) {
      $stmt = null;
      header("location: create.php?error=stmtfailed");
      exit();
    }
  }

  private function getEmployeeName($empId)
  {
    $stmt = $this->connect()->prepare("SELECT name FROM employees WHERE emp_id = ?");
    $stmt->execute([$empId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['name'])) {
      return $result['name'];
    } else {
      return "Unknown";
    }
  }

  protected function validityCheck($empId)
  {
    $stmt = $this->connect()->prepare("SELECT emp_id FROM employees WHERE emp_id = ?");

    if (!$stmt->execute(array($empId))) {
      $stmt = null;
      header("location: create.php?error=stmtfailed");
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
}
