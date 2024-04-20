<?php
class Read extends Dbh
{
  public function readEmp($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name)
  {
    $pdo = $this->connect();

    $sql = "SELECT * FROM employees WHERE 1=1";

    $params = array();

    if (!empty($empId)) {
      $sql .= " AND emp_id = :empId";
      $params['empId'] = $empId;
    }

    if (!empty($name)) {
      $sql .= " AND name = :name";
      $params['name'] = $name;
    }

    if (!empty($address)) {
      $sql .= " AND address = :address";
      $params['address'] = $address;
    }

    if (!empty($salary)) {
      $sql .= " AND salary = :salary";
      $params['salary'] = $salary;
    }

    if (!empty($dob)) {
      $sql .= " AND dob = :dob";
      $params['dob'] = $dob;
    }

    if (!empty($nin)) {
      $sql .= " AND nin = :nin";
      $params['nin'] = $nin;
    }

    if (!empty($department)) {
      $sql .= " AND department = :department";
      $params['department'] = $department;
    }

    if (!empty($emergency_name)) {
      $sql .= " AND emergency_name = :emergency_name";
      $params['emergency_name'] = $emergency_name;
    }

    if (!empty($emergency_relationship)) {
      $sql .= " AND emergency_relationship = :emergency_relationship";
      $params['emergency_relationship'] = $emergency_relationship;
    }

    if (!empty($emergency_phone)) {
      $sql .= " AND emergency_phone = :emergency_phone";
      $params['emergency_phone'] = $emergency_phone;
    }

    if (!empty($manager_name)) {
      $sql .= " AND manager_name = :manager_name";
      $params['manager_name'] = $manager_name;
    }

    $stmt = $pdo->prepare($sql);

    foreach ($params as $key => $value) {
      $stmt->bindValue(':' . $key, $value);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
