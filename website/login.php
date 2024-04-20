<!DOCTYPE html>
<html>

<head>
  <title>Kilburnazon Registration & Login</title>
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

    .register-button {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 10%;
      height: 4%;
    }
  </style>
</head>


<body>
  <form action="register.php" method="POST">
    <button type="submit" class="register-button" name="register">REGISTER</button>
  </form>
  <center>
    <h1>Kilburnazon Registration & Login</h1>
    <form action="login.inc.php" method="POST">
      <input type="text" id="eid" name="eid" placeholder="Enter Employee ID"><br><br>
      <input type="password" id="password" name="password" placeholder="Enter Password "><br><br>

      <button type="submit" name="login">LOGIN</button>
    </form>
  </center>
</body>

</html>
<?php
session_start();

if (isset($_POST['logout'])) {
  unset($_SESSION['eid']);
  header("location: login.php");
}
?>