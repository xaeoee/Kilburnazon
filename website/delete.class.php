<?php
class Delete extends Dbh
{
  protected function deleteEmp($empId)
  {
    $stmt = $this->connect()->prepare("DELETE FROM employees WHERE emp_id = :empId");

    if (!$stmt->execute([
      'empId' => $empId
    ])) {
      $stmt = null;
      header("location: delete.php?error=stmtfailed");
      exit();
    }

    $stmt = null;

    $stmt = $this->connect()->prepare("UPDATE log SET manager_id = :managerId WHERE emp_id = :empId");
    if (!$stmt->execute([
      'managerId' => $_SESSION["eid"],
      'empId' => $empId
    ])) {
      $stmt = null;
      header("location: delete.php?error=stmtfailed");
      exit();
    }
  }
}
