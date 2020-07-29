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
<link rel="stylesheet" href="styles.css">
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</style>
<style>
table, th, td {
  border: 1px solid black;
margin-left: 30px;
margin-right: 20px;
}
</style>
<style>
div1 {
 a:link {
  color: red;
}

/* visited link */
a:visited {
  color: green;
}

/* mouse over link */
a:hover {
  color: hotpink;
}

/* selected link */
a:active {
  color: blue;
}
  
 
}
</style>
</head>
<body>

<header>
<center>
  <h1><strong>Online Attendance Management System</strong> </h1>
</center>
  <div1 class="topnav">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="report.php">MY Report</a>
  <a href="account.php">MY Account</a>
  <a href="../logout.php">Logout</a>

</div1>

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
            <th scope="col">Batch</th>
            <th scope="col">Semester</th>
            <th scope="col">Email</th>
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









