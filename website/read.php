<?php
include_once('auth.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Get Employee Information</title>
  <style>
    body {
      background-color: whitesmoke;
    }

    input {
      width: 40%;
      height: 5%;
      border: 10px;
      border-radius: 5px;
      padding: 9px 15px 9px 15px;
      margin: 10px 0px 10px 0px;
      box-shadow: 2px 2px 2px 2px darkgray;
    }

    button {
      width: 40%;
      height: 5%;
      border: 10px;
      border-radius: 5px;
      padding: 9px 15px 9px 15px;
      margin: 10px 0px 10px 0px;
      box-shadow: 2px 2px 2px 2px darkgray;
    }

    .logout-button {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 10%;
      height: 4%;
    }

    .styled-table {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
    }

    .styled-table th,
    .styled-table td {
      padding: 8px;
      text-align: left;
    }

    .styled-table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <form action="login.php" method="POST">
    <button type="submit" class="logout-button" name="logout">LOGOUT</button>
  </form>
  <center>
    <h1>Get Employee Information</h1>
    <form action="read.php" method="POST">
      <input type="text" id="eid" name="eid" placeholder="Enter Employee ID      e.g 12-1234567"><br>
      <input type="text" id="name" name="name" placeholder="Enter Name"><br>
      <input type="text" id="address" name="address" placeholder="Enter Employee Address"><br>
      <input type="text" id="salary" name="salary" placeholder="Enter Employee Salary      e.g  £12,345.67"><br>
      <input type="text" id="dob" name="dob" placeholder="Enter Employee Date of Birth      e.g DD/MM/YY"><br>
      <input type="text" id="nin" name="nin" placeholder="Enter Employee NIN Number      e.g yt152391k"><br>
      <input type="text" id="department" name="department" placeholder="Enter Employee Department      e.g HR/Driver/Packager/Manager"><br>
      <input type="text" id="emergency_name" name="emergency_name" placeholder="Enter Employee Emergency Contact Name"><br>
      <input type="text" id="emergency_relationship" name="emergency_relationship" placeholder="Enter Employee Emergency Contact Relationship"><br>
      <input type="text" id="emergency_phone" name="emergency_phone" placeholder="Enter Employee Emergency Contact Number      e.g 07123 456 789"><br>
      <input type="text" id="manager_name" name="manager_name" placeholder="Enter Manager Name"><br>
      <button type="submit" name="reading">READ</button>
      <button type="submit" name="birthday">Birthday In Current Month</button>
    </form>
    <table class="styled-table">
      <table border='1'>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Salary</th>
          <th>Date of Birth</th>
          <th>NIN Number</th>
          <th>Department</th>
          <th>Emergency Contact Name</th>
          <th>Emergency Relationship</th>
          <th>Emergency Phone</th>
          <th>Manager Name</th>
        </tr>
        <tbody>
          <?php
          if (isset($_POST["reading"])) {
            include "dbh.php";
            include 'read.class.php';
            include 'read.controller.php';

            $empId = $_POST['eid'] ?? '';
            $name = $_POST['name'] ?? '';
            $address = $_POST['address'] ?? '';
            $salary = $_POST['salary'] ?? '';
            $dob = $_POST['dob'] ?? '';
            $nin = $_POST['nin'] ?? '';
            $department = $_POST['department'] ?? '';
            $emergency_name = $_POST['emergency_name'] ?? '';
            $emergency_relationship = $_POST['emergency_relationship'] ?? '';
            $emergency_phone = $_POST['emergency_phone'] ?? '';
            $manager_name = $_POST['manager_name'] ?? '';

            $read = new ReadController($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name);

            $fetchedList = $read->read(
              $empId,
              $name,
              $address,
              $salary,
              $dob,
              $nin,
              $department,
              $emergency_name,
              $emergency_relationship,
              $emergency_phone,
              $manager_name
            );
            if (!empty($fetchedList)) {
              foreach ($fetchedList as $row) {
                echo "<tr>
          <td>{$row['emp_id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['address']}</td>
          <td>{$row['salary']}</td>
          <td>{$row['dob']}</td>
          <td>{$row['nin']}</td>
          <td>{$row['department']}</td>
          <td>{$row['emergency_name']}</td>
          <td>{$row['emergency_relationship']}</td>
          <td>{$row['emergency_phone']}</td>
          <td>{$row['manager_name']}</td>
            </tr>";
              }
            } else {
              echo "please fill the form";
            }
          }
          if (isset($_POST["birthday"])) {
            include "db.php";
            $stmt = $pdo->prepare("CALL GetEmployeesWithBirthday()");
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
              echo "<tr>
                <td>{$row['emp_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['salary']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['nin']}</td>
                <td>{$row['department']}</td>
                <td>{$row['emergency_name']}</td>
                <td>{$row['emergency_relationship']}</td>
                <td>{$row['emergency_phone']}</td>
                <td>{$row['manager_name']}</td>
                </tr>";
            }
          }
          ?>
        </tbody>
      </table>
  </center>
</body>

</html>