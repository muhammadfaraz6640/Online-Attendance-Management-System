<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System </title>
<meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="mainn.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</style>
<style>
table, th, td {
  border: 1px solid black;
margin-left: 20px;
}
</style>
</head>
<body>

<header>

  <h1>Online Attendance Management System </h1>
  <div class="navbar">
   <a href="signup.php">Create Users</a>
  <a href="index.php">Add Data</a>
  <a href="students.php">Students</a>
  <a href="teachers.php">Faculties</a>
  <a href="../logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">

  <div class="content">
    <h3 style="font-size: 30px; color: #1F456E;"><b>Student List</b></h3>
    
    <table class="table table=stripped">
        <thead>  
          <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
          </tr>
        </thead>

      <?php

        $i=0;
        $st_query = mysqli_query($con,"select * from students order by st_id asc");

        while($st_data = mysqli_fetch_array($st_query)) {
          $i++;

        ?>
          <tbody>
              <tr>
                <td><?php echo $st_data['st_id']; ?></td>
                <td><?php echo $st_data['st_name']; ?></td>
                <td><?php echo $st_data['st_password']; ?></td>
                <td><?php echo $st_data['st_batch']; ?></td>
                <td><?php echo $st_data['st_sem']; ?></td>
                <td><?php echo $st_data['st_email']; ?></td>
              </tr>
          </tbody>

          <?php } ?>
          
    </table>

  </div>

</div>

</center>

</body>
</html>










