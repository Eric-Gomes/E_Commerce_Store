<?php

session_start();
include("includes/dbase.php");

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Admin Login</title>   
<link href="css/bootstrap.min.css" rel="stylesheet">    
<link href="css/login-page.css" rel="stylesheet">    
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"> 
 </head>

    <body>
     <div class="container">
      <form class="form-login" action="" method="post">
         <h2 class="form-login-heading">Admin Login</h2>
          <input type="text" class="form-control" name="admin_email" placeholder="Email" required>
          <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
          <button class="btn btn-success btn-lg btn-block" type="submit" name="admin_login">Log In</button>
      </form>    
     </div>
    
    
    </body>
</html>

<?php
if(isset($_POST['admin_login'])) {
$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
$admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);
$get_admin = "SELECT * from admin where admin_email='$admin_email' AND admin_password='$admin_password'";
$run_admin = mysqli_query($con, $get_admin);
$count = mysqli_num_rows($run_admin);

if($count==1) {
$_SESSION['admin_email']= $admin_email;
echo "<script>alert('You have logged in.')</script>";
echo "<script>window.open('index.php?dashboard','_self')</script>";    
    
}    
    else {
        echo "<script>alert('Email or Password in incorrect')</script>";
    }
}


?>