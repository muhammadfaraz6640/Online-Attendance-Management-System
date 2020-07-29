<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System 1.0</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="mainn.css">

</head>
<body>

<header>
<center>

  <h1 ><strong>Online Attendance Management System </strong></h1>
  
</center >
  <div style="text-decoration: none;" class="topnav">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="attendance.php">Attendance</a>
  <a href="report.php">Report</a>
  <a href="../logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">
    <div class="content">
      <p style="font-size: 20px;"><b>A Good Teacher Is like a Candle :)</b></p>
      <img src="sclr.jpg" alt="picture here" width="200" height="200">

  </div>

</div>

</center>

</body>
</html>
