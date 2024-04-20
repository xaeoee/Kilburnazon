<!DOCTYPE html>
<html>

<head>
  <title>Kilburnazon Registration</title>
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
  </style>
</head>

<body>
  <center>
    <h1>Kilburnazon Registration</h1>
    <form action="register.inc.php" method="POST">
      <input type="text" name="eid" placeholder="Enter Employee ID"><br><br>
      <input type="password" name="password" placeholder="Enter Password"><br><br>

      <button type="submit" name="register">REGISTER</button>
    </form>
  </center>
</body>

</html>