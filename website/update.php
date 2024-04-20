<?php
include_once('auth.php');
?>

<?php
include "db.php";
$empId = "";
$name = "";
$address = "";
$salary = "";
$dob = "";
$nin = "";
$department = "";
$emergency_name = "";
$emergency_relationship = "";
$emergency_phone = "";
$manager_name = "";

if (isset($_POST['search'])) {
  $empId = $_POST["eid"];

  $sql = "SELECT * FROM employees WHERE emp_id = :empId";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute(array(":empId" => $empId))) {
    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $empId = $row['emp_id'];
      $name = $row['name'];
      $address = $row['address'];
      $salary = $row['salary'];
      $dob = $row['dob'];
      $nin = $row['nin'];
      $department = $row['department'];
      $emergency_name = $row['emergency_name'];
      $emergency_relationship = $row['emergency_relationship'];
      $emergency_phone = $row['emergency_phone'];
      $manager_name = $row['manager_name'];
    } else {
      echo '<script> alert("No Data Found"); window.location.href = "update.php?error=NoDataFound";</script>';
      exit();
    }
  } else {
    echo '<script> alert("Data Not Search"); window.location.href = "update.php?error=DataNotSearched";</script>';
    exit();
  }
}
?>

<?php
include "db.php";
include "validation.php";

if (isset($_POST['updating'])) {
  $empId = $_POST["eid"];
  $name = $_POST["name"];
  $address = $_POST["address"];
  $salary = $_POST["salary"];
  $dob = $_POST["dob"];
  $nin = $_POST["nin"];
  $department = $_POST["department"];
  $emergency_name = $_POST["emergency_name"];
  $emergency_relationship = $_POST["emergency_relationship"];
  $emergency_phone = $_POST["emergency_phone"];
  $manager_name = $_POST["manager_name"];

  validityChecking($empId, $name, $address, $salary, $dob, $nin, $department, $emergency_name, $emergency_relationship, $emergency_phone, $manager_name);

  $sql = "UPDATE employees SET emp_id = :empId, name = :name, address = :address, salary = :salary, dob = :dob, nin = :nin, department = :department, emergency_name = :emergency_name, emergency_relationship = :emergency_relationship, emergency_phone = :emergency_phone, manager_name = :manager_name WHERE emp_id = :empId";
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute(array(":empId" => $empId, ":name" => $name, ":address" => $address, ":salary" => $salary, ":dob" => $dob, ":nin" => $nin, ":department" => $department, ":emergency_name" => $emergency_name, ":emergency_relationship" => $emergency_relationship, ":emergency_phone" => $emergency_phone, ":manager_name" => $manager_name))) {
    echo '<script> alert("Data updated") </script>';
    echo '<script> window.location.replace("index.php"); </script>';
  } else {
    echo '<script> alert("Data update failed ") </script>';
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Update Employee's Information</title>
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
  </style>
</head>

<body>
  <form action="login.php" method="POST">
    <button type="submit" class="logout-button" name="logout">LOGOUT</button>
  </form>
  <center>
    <h1>Update Employee's Information</h1>
    <h2 style="color: red;">Search with Employee's ID then update</h2>
    <form action="" method="POST">
      <input type="text" id="eid" name="eid" value="<?php echo  $empId; ?>" placeholder="Enter Employee ID      e.g 12-1234567"><br>
      <input type=" text" id="name" name="name" value="<?php echo  $name; ?>" placeholder="Enter Name"><br>
      <input type="text" id="address" name="address" value="<?php echo  $address; ?>" placeholder="Enter Employee Address"><br>
      <input type="text" id="salary" name="salary" value="<?php echo  $salary; ?>" placeholder="Enter Employee Salary      e.g  £12,345.67"><br>
      <input type="text" id="dob" name="dob" value="<?php echo  $dob; ?>" placeholder="Enter Employee Date of Birth      e.g DD/MM/YY"><br>
      <input type="text" id="nin" name="nin" value="<?php echo  $nin; ?>" placeholder="Enter Employee NIN Number      e.g yt152391k"><br>
      <input type="text" id="department" name="department" value="<?php echo  $department; ?>" placeholder="Enter Employee Department      e.g HR/Driver/Packager/Manager"><br>
      <input type="text" id="emergency_name" name="emergency_name" value="<?php echo  $emergency_name; ?>" placeholder="Enter Employee Emergency Contact Name"><br>
      <input type="text" id="emergency_relationship" name="emergency_relationship" value="<?php echo  $emergency_relationship; ?>" placeholder="Enter Employee Emergency Contact Relationship"><br>
      <input type="text" id="emergency_phone" name="emergency_phone" value="<?php echo  $emergency_phone; ?>" placeholder="Enter Employee Emergency Contact Number      e.g 07123 456 789"><br>
      <input type="text" id="manager_name" name="manager_name" value="<?php echo  $manager_name; ?>" placeholder="Enter Manager Name"><br>
      <button type="submit" name="search">SEARCH</button>
      <button type="submit" name="updating">UPDATE</button>
    </form>
  </center>
</body>

</html>