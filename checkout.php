<?php

include("includes/dbase.php");
include("functions/functions.php");

session_start();

?>

<!DOCTYPE html>
<html>

<head>

<title>Shop and Drop</title>

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="styles/main.css" rel="stylesheet">

</head>

<body>

<div id="navbar"> 

<div class="container"> 

 <div class="col-md-2 offer"><a href="customers/account.php">
     
      <?php
     if(!isset($_SESSION['customer_email'])){
         echo "Welcome : Guest";
     } else {
         echo  $_SESSION['customer_email'] . "";
     }
     
     
     ?>
     
     </a>
  
 </div> 

<div class="col-md-10"> 

<ul class="menu"> 

<li>
<?php
if(!isset($_SESSION['customer_email'])){
    echo "<a href='customer-registration.php'>New User?</a>";
}   else {
    echo "";
} 
    
?>
</li>

<li> <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'> Account</a>";
    } else {
        echo "<a href='customers/account.php?my_order'>My Account</a>";
    }
    
    
    ?></li>

<li><a href="cart.php">Shopping Cart</a></li>

<li>
<?php 
if(!isset($_SESSION['customer_email'])){
echo "<a href='checkout.php'>Login</a>";
  } else {
echo "<a href='logout.php'>Logout</a>";
    }    
?>
</li>

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

 
</div> <!--navbar header -->

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
        echo "<a href='checkout.php'>Account</a>";
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
        
        <div class="col-md-9">
        <?php
            if(!isset($_SESSION['customer_email'])) {
                include("customers/customer-login.php");
            } else {
                include("payment.php");
            }
            
            ?>
        
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