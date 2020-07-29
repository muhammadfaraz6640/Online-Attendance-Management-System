
      <?php

include('connect.php');

  try{
    
      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

        if(empty($_POST['uname'])){
           throw new Exception("Username cann't be empty.");
        }

        if(empty($_POST['pass'])){
           throw new Exception("Password cann't be empty.");
        }
        
        if(empty($_POST['fname'])){
           throw new Exception("Username cann't be empty.");
        }
        if(empty($_POST['phone'])){
           throw new Exception("Username cann't be empty.");
        }
        //   if(empty($_POST['semester'])){
        //    throw new Exception("semster cann't be empty.");
        // }
        //   if(empty($_POST['Batch'])){
        //    throw new Exception("batch cann't be empty.");
        // }
        if(empty($_POST['dept'])){
          throw new Exception("Department cann't be empty.");
       }
        if(empty($_POST['type'])){
           throw new Exception("Username cann't be empty.");
        }
        $query_insert_adm = "INSERT into admininfo(`username`,`password`,`email`,`fname`,`phone`,`type`) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')";                    
        $is_inserted_adm = mysqli_query($con,$query_insert_adm);        
        if($_POST['type'] == 'student'){
          $query_insert_std = "INSERT into students(st_name,st_dept,st_batch,st_sem,st_email) values('$_POST[uname]','$_POST[dept]','$_POST[Batch]','$_POST[semester]','$_POST[email]')";                    
          $is_inserted_std = mysqli_query($con,$query_insert_std);        
        }
        else if($_POST['type'] == 'teacher'){
          $query_insert_t = "INSERT into teachers(tc_name,tc_dept,tc_email) values('$_POST[uname]','$_POST[dept]','$_POST[email]')";                    
          $is_inserted_t = mysqli_query($con,$query_insert_t);        
        }
        if($is_inserted_adm && ($is_inserted_std || $is_inserted_t)){      // MySQL datetime format
            echo "<script>alert('Signup Successfully!')</script>";                    
        }          
        

  
  }
  }
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System 1.0</title>
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

  <h1>Online Attendance Management System 1.0</h1>

</header>
<center>
<h1>Signup</h1>
<div class="content">

  <div class="row">
    <?php
    if(isset($success_msg)) echo $success_msg;
    if(isset($error_msg)) echo $error_msg;
     ?>


    <form method="post" class="form-horizontal col-md-6 col-md-offset-3">

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="text" name="email"  class="form-control" id="input1" placeholder="your email" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="uname"  class="form-control" id="input1" placeholder="choose username" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-7">
            <input type="password" name="pass"  class="form-control" id="input1" placeholder="choose a strong password" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-7">
            <input type="text" name="fname"  class="form-control" id="input1" placeholder="your full name" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-7">
            <input type="text" name="phone"  class="form-control" id="input1" placeholder="your phone number" />
          </div>
      </div>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-7">
            <input type="text" name="dept"  class="form-control" id="input1" placeholder="your phone number" />
          </div>
      </div>
     <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Semester</label>
          <div class="col-sm-7">
            <input type="int" name="semester"  class="form-control" id="input1" placeholder="your semester" />
          </div>
      </div>
         <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Batch</label>
          <div class="col-sm-7">
            <input type="text" name="Batch"  class="form-control" id="input1" placeholder="your Batch" />
          </div>
      </div>


      <div class="form-group" class="radio">
      <label for="input1" class="col-sm-3 control-label">Role</label>
      <div class="col-sm-7">
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
        </label>
            <label>
          <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
        </label>
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
        </label> 
      </div>
      </div>

      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup" />

    </form>
    


  </div>
    <br>
    <p><strong>Already have an account? <a href="index.php">Login</a> here.</strong></p>

</div>

</center>

</body>
</html>
