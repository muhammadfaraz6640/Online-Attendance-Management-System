<?php

ob_start();
session_start();
include('connect.php');
date_default_timezone_set("Asia/Karachi");
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>

<header>
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
  $query6 = "SELECT st_id FROM students where st_email='$email'";          
  $run_query6 = mysqli_query($con , $query6) or die("Error: " . mysqli_error($con));
  while($rd6 = mysqli_fetch_array($run_query6))
  {          
  $sid =  $rd6["st_id"];                       
  }
  //getting semester and dept from std
  $query7 = "SELECT st_dept, st_sem FROM students where st_id='$sid'";          
  $run_query7 = mysqli_query($con , $query7) or die("Error: " . mysqli_error($con));
  while($rd7 = mysqli_fetch_array($run_query7))
  {          
  $semester =  $rd7["st_sem"];                       
  $dept =  $rd7["st_dept"];                       
  }
  //getting dept_id from dept_name
  $query8 = "SELECT Did FROM department where Dept_Name='$dept'";          
  $run_query8 = mysqli_query($con , $query8) or die("Error: " . mysqli_error($con));
  while($rd8 = mysqli_fetch_array($run_query8))
  {          
  $dept_id =  $rd8["Did"];                       
  }
//   //getting course names from dept_id and semseter
//   $query9 = "SELECT CourseName FROM course where Dept_id='$dept_id' AND Semester='$semester'";          
//   $run_query9 = mysqli_query($con , $query9) or die("Error: " . mysqli_error($con));
//   while($rd9 = mysqli_fetch_array($run_query9))
//   {          
//   $course_name =  $rd9["CourseName"];                       
//   }
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
<h1 style="background-color:powderblue; , font-family:verdana;">  Welcome To Attendance Record System</h1>
</center>
<header>
        <div class="main-header">
        <h1>Guidelines For Recording Attendance</h1>
            <hr/>            
            <ul>
                <li>You must have stable internet Connection</li>
                <li>First Press Start Recording Button</li>
                <li>Say <b>Present</b> in Louder Voice</li>
                <li>Then Press Enter Attendance Button to submit attendance</li>
            </ul>
        <h1>Record Your Attendance</h1>
        <hr/>            
        <button id="start-btn" title="Start">Start Recording</button>
        <form action="std_attendance.php" method="post" enctype="multipart/form-data">
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
            <input type="text" id="textbox" name="textbox" style="visibility: hidden;" required><br />            
            <input type="submit" class="btn btn-primary butt" name="Enter_Att" id="sub" value="Enter Attendance">
            </form>
            <br />
            
            <?php                                
            if(isset($_POST['Enter_Att'])){
                $course_selected_for_attendance = $_POST['coursename'];
                //getting course_id from coursename
                $query10 = "SELECT Cid FROM course where CourseName='$course_selected_for_attendance'";          
                $run_query10 = mysqli_query($con , $query10) or die("Error: " . mysqli_error($con));
                while($rd10 = mysqli_fetch_array($run_query10))
                {          
                $course_id =  $rd10["Cid"];              
                }
                // echo "$course_selected_for_attendance";                
                $statement = $_POST['textbox'];
                if($statement == "present" || $statement == "absent"){
                    $now = new DateTime();
                    $time = $now->format('Y-m-d H:i:s');
                    $query_insert_att = "INSERT INTO markedattendance (`Std_id`, `Course_id`, `Status`, `AttDateTime`) VALUES('$sid' , '$course_id' , '$statement' , '$time')";                    
                    $is_inserted_att = mysqli_query($con,$query_insert_att);
                    if($is_inserted_att){      // MySQL datetime format
                    echo "<script>alert('Inserted Attendance Successfully')</script>";                    
                    }                    
                }
                else{
                    echo "<script>alert('not getting value...Say Again by clicking start recording button')</script>";                                        
                }
            }        
            ?>
            <br />
        </div>
    </header>
    <script>
    $(document).ready(function () {
  $("#sub").click(function () {

      var subjects = $('#courses');
      if (subjects.val() === 'Select Subject') {
          alert("Please select an item from the list and then proceed!");
          $('#courses').focus();

          return false;
      }
      else return;
  });
});
    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="app.js"></script>
</body>
</html>
