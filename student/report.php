<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
else{
    $username = $_SESSION['us_name'];
    $pass = $_SESSION['pass'];
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

</head>
<body>

<header>

  <h1 style= "color: navy;"><b>Online Attendance Management System </b></h1>
  <div style="background-color: navy;" class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="attendance.php">Attendance</a>
  <a href="report.php">Report</a>
  <a href="../logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">
<?php
 global $con;
 //getting email from admin table
 $query5 = "SELECT email FROM admininfo where username='$username' AND password='$pass'";          
 $run_query5 = mysqli_query($con , $query5) or die("Error: " . mysqli_error($con));
 $email = "";
 while($rd5 = mysqli_fetch_array($run_query5))
 {          
 $email =  $rd5["email"];                       
 }
 //now getting std_id from student table based on email
 $query6 = "SELECT st_id,st_name FROM students where st_email='$email'";          
 $run_query6 = mysqli_query($con , $query6) or die("Error: " . mysqli_error($con));
 $sid = 0;
 while($rd6 = mysqli_fetch_array($run_query6))
 {          
 $sid =  $rd6["st_id"];                       
 $sname =  $rd6["st_name"];    
 }
 //getting semester and dept from std
 $query7 = "SELECT st_dept, st_sem FROM students where st_id='$sid'";          
 $run_query7 = mysqli_query($con , $query7) or die("Error: " . mysqli_error($con));
 $semester = 0;
 $dept = "";
 while($rd7 = mysqli_fetch_array($run_query7))
 {          
 $semester =  $rd7["st_sem"];                       
 $dept =  $rd7["st_dept"];                       
 }
 //getting dept_id from dept_name
 $query8 = "SELECT Did FROM department where Dept_Name='$dept'";          
 $run_query8 = mysqli_query($con , $query8) or die("Error: " . mysqli_error($con));
 $dept_id = 0;
 while($rd8 = mysqli_fetch_array($run_query8))
 {          
 $dept_id =  $rd8["Did"];                       
 }
?>
  <div class="content">
    <h3>Individual Report</h3>

    <form method="post" action="">

    <label>Select Subject</label>
    <select name="coursename" id="courses">
    <option selected>Select Subject</option>
  <?php
    //getting course names from dept_id and semseter
    $query9 = "SELECT CourseName FROM course where Dept_id='$dept_id' AND Semester='$semester'";          
    $run_query9 = mysqli_query($con , $query9) or die("Error: " . mysqli_error($con));
    while($rd9 = mysqli_fetch_array($run_query9))
    {          
    $course_name =  $rd9["CourseName"];  
    echo "                
    <option  value='$course_name'>$course_name</option>             
    ";                     
    }  
  ?>
</select>      
      <input type="submit" name="sr_btn" value="Get Attendance" >
    </form>



   <?php

    if(isset($_POST['sr_btn'])){
     
     $courseName = $_POST['coursename'];
    //getting course_id from coursename
    $query10 = "SELECT Cid FROM course where CourseName='$courseName'";          
    $run_query10 = mysqli_query($con , $query10) or die("Error: " . mysqli_error($con));
    $course_id = 0;
    while($rd10 = mysqli_fetch_array($run_query10))
    {          
    $course_id =  $rd10["Cid"];              
    }
      $single = "SELECT count(*) as countP from markedattendance where markedattendance.Std_id='$sid' and markedattendance.Course_id = '$course_id' and markedattendance.Status='present'";      
      $all = "SELECT count(*) as countA from markedattendance where markedattendance.Std_id='$sid' and markedattendance.Course_id = '$course_id' ";      
      $run_query1 = mysqli_query($con , $all) or die("Error: " . mysqli_error($con));
      $run_query10 = mysqli_query($con , $single) or die("Error: " . mysqli_error($con));
      $count_present = 0;
      $count_all = 0;
      while($rd11 = mysqli_fetch_array($run_query10))
        {          
        $count_present =  $rd11["countP"];              
        }
      while($rd1 = mysqli_fetch_array($run_query1))
      {          
      $count_all =  $rd1["countA"];              
      }
        // echo "$count_present";              
      
   ?>  
 <table class="table table-stripped">
      <thead>
        <tr>          
          <th scope="col">ID</th>
          <th scope="col">Name</th>                    
          <th scope="col">Subject</th>    
          <th scope="col">Total Classes Attended</th>
          <th scope="col">Total Classes Held</th>
        </tr>
     </thead>
     <tbody>
           <tr>
             <td><?php echo $sid ;?></td>
             <td><?php echo $sname  ?></td>
             <td><?php echo $_POST['coursename'];  ?></td>
             <td><?php echo  $count_present; ?></td>
             <td><?php echo $count_all; ?></td>  
           </tr>
        </tbody>
     <?php
    }
    ?>
  </div>

</div>

</center>

</body>
</html>
