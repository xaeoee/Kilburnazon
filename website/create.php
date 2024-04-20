<?php
include_once('auth.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add New Employee</title>
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
    <h1>Add New Employee</h1>
    <form action="create.inc.php" method="POST">
      <input type="text" id="eid" name="eid" placeholder="Enter Employee ID      e.g 12-1234567"><br><br>
      <input type="text" id="name" name="name" placeholder="Enter Name"><br><br>
      <input type="text" id="address" name="address" placeholder="Enter Employee Address"><br><br>
      <input type="text" id="salary" name="salary" placeholder="Enter Employee Salary      e.g  £12,345.67"><br><br>
      <input type="text" id="dob" name="dob" placeholder="Enter Employee Date of Birth      e.g DD/MM/YY"><br><br>
      <input type="text" id="nin" name="nin" placeholder="Enter Employee NIN Number      e.g yt152391k"><br><br>
      <input type="text" id="department" name="department" placeholder="Enter Employee Department      e.g HR/Driver/Packager/Manager"><br><br>
      <input type="text" id="emergency_name" name="emergency_name" placeholder="Enter Employee Emergency Contact Name"><br><br>
      <input type="text" id="emergency_relationship" name="emergency_relationship" placeholder="Enter Employee Emergency Contact Relationship"><br><br>
      <input type="text" id="emergency_phone" name="emergency_phone" placeholder="Enter Employee Emergency Contact Number      e.g 07123 456 789"><br><br>
      <button type="submit" name="create">CREATE</button>
    </form>
  </center>
</body>

</html>