<?php

ob_start();
session_start();
include('connect.php');
$username = "";
if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
else{
  $username = $_SESSION['us_name'];
  $pass = $_SESSION['pass'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System 1.0</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="mainn.css">
<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<body>

<header>
  <?php
  // global $con;
  // //getting email from admin table
  // $query5 = "SELECT email FROM admininfo where username='$username' AND password='$pass'";          
  // $run_query5 = mysqli_query($con , $query5) or die("Error: " . mysqli_error($conn));
  // $email = "";
  // while($rd5 = mysqli_fetch_array($run_query5))
  // {          
  // $email =  $rd5["email"];                       
  // }
  // //now getting std_id from student table based on email
  // $query6 = "SELECT st_id FROM students where st_email='$email'";          
  // $run_query6 = mysqli_query($con , $query6) or die("Error: " . mysqli_error($conn));
  // while($rd6 = mysqli_fetch_array($run_query6))
  // {          
  // $sid =  $rd6["st_id"];                       
  // }
  ?>
  <h1>Online Attendance Management System </h1>
  <div style="text-decoration: none;" class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="report.php">My report</a>
  <a href="account.php">My Account</a>
  <a href="std_attendance.php">Attendance</a>  
  <a href="../logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">
    <div class="content">
      <p style="font-size: 20px;"><b>
    <h1 style="background-color:powderblue; , font-family:verdana;">  Welcome Students</h1>
          Be Attentive and Regular:)</b></p>
      <img src="stu.jpg" alt="picture here" width="200" height="200">

  </div>

</div>

</center>
        
</body>
</html>
