<!DOCTYPE html>
<html>

<head>
  <title>Kilburnazon</title>
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
    <h1>Kilburnazon</h1>
    <form action="create.php" method="POST">
      <button type="submit" name="create">CREATE</button>
    </form>
    <form action="read.php" method="POST">
      <button type="submit" name="read">READ</button>
    </form>
    <form action="update.php" method="POST">
      <button type="submit" name="update">UPDATE</button>
    </form>
    <form action="delete.php" method="POST">
      <button type="submit" name="delete">DELETE</button>
    </form>
  </center>
</body>

</html>

<?php
include_once('auth.php');
?>