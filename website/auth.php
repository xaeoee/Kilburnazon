<?php

session_start();

if (!isset($_SESSION['eid'])) {
  header("Location: login.php");
  exit();
}
