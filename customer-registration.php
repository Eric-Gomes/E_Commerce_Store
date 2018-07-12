<?php

include("includes/dbase.php");
include("functions/functions.php");

session_start();

?>

<!DOCTYPE html>
<html>

<head>

<title>Shop & Drop</title>

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="styles/main.css" rel="stylesheet">

</head>

<body>

<div id="navbar"> 

<div class="container"> 

 <div class="col-md-6 offer"><a href="customers/account.php">
     <?php
     if(!isset($_SESSION['customer_email'])){
         echo "Welcome : Guest";
     } else {
         echo  $_SESSION['customer_email'] . "";
     }
     
     
     ?>
     
     </a>
  
 </div> <!-- col ends -->

<div class="col-md-6"> <!-- col start -->

<ul class="menu"> <!--menu start -->

<li><a href="customer-registration.php">New User? </a></li>

<li> <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'>Account</a>";
    } else {
        echo "<a href='customers/account.php?my_order'>My Account</a>";
    }
    
    
    ?></li>

<li><a href="cart.php">Shopping Cart</a></li>

<li><?php 
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'>Login</a>";
    } else {
        echo "<a href='logout.php'>Logout</a>";
    }
    
    
    ?></li>

</ul> 
 </div> 
</div> 
</div> 

<div class="navbar navbar-inverse" id="nav"> 
<div class="container"> 

<div class="navbar-header"> 
<a class="navbar-brand home" href="index.php"> 

</a> 

 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle Navigation</span>
<i class="fa fa-align-justify"></i>
 </button>

 
</div> 

<div class="navbar-collapse collapse" id="navigation"> 
<div class="padding-nav"> 
<ul class="nav navbar-nav navbar-left"> 
<li>
<a href="index.php">Home </a>
</li>

<li>
  <a href="shop.php">Shop</a>
</li>

<li>
   <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'>Your Account</a>";
    } else {
        echo "<a href='customers/account.php?my_order'>My Account</a>";
    }
    
    
    ?>
</li>

<li>
  <a href="cart.php">Shopping Cart</a>
</li>

<li>
  <a href="contact-us.php">Contact Us</a>
</li>
</ul>  

</div>  
<a class="btn btn-success navbar-btn right" href="cart.php">
    <i class="fa fa-shopping-cart"></i>
  <span> <?php getItems(); ?> items in cart</span>
</a> 
    
    


</div> 

</div> 
</div> 
    
    
<div id="content">
    <div class="container">
      <div class="col-md-12">
        
        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
            
          </li>
            
            <li>Register</li>
          
        </ul>
        
      </div>
        
        <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">Create New Account</h2>
            </div>
            
        
            <div class="panel-body">
            <form action="customer-registration.php" method="post">
                
            <div class="form-group text-center">
                <label>Name</label>
                <input type="text" class="form-control" name="c_name" required placeholder="Enter Name">
                <small id="emailid" class="form-text text-muted">We will never share your email with anyone else.</small>
                
            </div>
                
                <div class="form-group text-center">
                <label>Email</label>
                <input type="text" class="form-control" name="c_email" required placeholder="Email">
                
            </div>
                
                <div class="form-group text-center">
                <label>Password</label>
                <input type="text" class="form-control" name="c_password" required placeholder="Password">
                
            </div>
                
                <div class="form-group text-center">
                <label>Country</label>
                <input type="text" class="form-control" name="c_country" required placeholder="Country">
                
            </div>
                
                <div class="form-group text-center">
                <label>City</label>
                <input type="text" class="form-control" name="c_city" required placeholder="City">
                
            </div>
                
                <div class="form-group text-center">
                <label>Address Line 1</label>
                <input type="text" class="form-control" name="c_address" required placeholder="Address 1">
                
            </div>
                
                <div class="form-group text-center">
                <label>Contact</label>
                <input type="text" class="form-control" name="c_contact" required placeholder="Contact">
                
            </div>
                
                <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control-file center" name="c_image">
                
            </div>
                
                <div class="text-center">
                <button type="submit" name="register" class="btn btn-success"> 
                    <i class="fa fa-user-md"></i>  Sign Up Now!
                    
                    </button>
                </div>
            
            </form>
            </div>
            </div>
        </div>
        
       
        
           </div>
    
    
</div>    
    
<?php
include("includes/footer.php");    
?>
    
    


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>



</html>

<?php

if(isset($_POST['register'])){
    
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_password = $_POST['c_password'];
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_address = $_POST['c_address'];
$c_contact = $_POST['c_contact'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_ip = getUserIP();   
move_uploaded_file($c_image_tmp,"customers/customer-image/$c_image");

$insert_customer = "INSERT into customers (customer_name, customer_email, customer_password, customer_country, customer_city, customer_address, customer_contact, customer_image, customer_ip_address) values ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_address','$c_contact','$c_image','$c_ip')";    
    
$run_customer = mysqli_query($con, $insert_customer);
$select_cart = "SELECT * from cart where address='$c_ip'";
$run_cart = mysqli_query($con,$select_cart);
$check_cart = mysqli_num_rows($run_cart);
    
if($check_cart>0){
$_SESSION['customer_email']=$c_email;
echo "<script>alert('You have been Registered Successfully')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}else{
$_SESSION['customer_email']=$c_email;
echo "<script>alert('You have been Registered Successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";


}
    
}
?>