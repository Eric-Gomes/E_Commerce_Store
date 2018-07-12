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

 <div class="col-md-6 offer"><a href="customers/account.php">
      <?php
     if(!isset($_SESSION['customer_email'])){
         echo "Welcome : Guest";
     } else {
         echo  $_SESSION['customer_email'] . "";
     }
     
     
     ?>
     
     </a>
  
 </div> 

<div class="col-md-6"> 

<ul class="menu"> 

<li>
<?php
  if(!isset($_SESSION['customer_email'])){
      echo "<a href='customer-registration.php'>New User?</a>";
  } else {
      echo "";
  }  
    
?>    
</li>

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
        echo "<a href='checkout.php'>Account</a>";
    } else {
        echo "<a href='customers/account.php?my_order'>My Account</a>";
    }
    
    
    ?>
</li>

<li>
  <a href="cart.php">Shopping Cart</a>
</li>

<li class="active">
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
            
            <li>Contact Us</li>
          
        </ul>
        
      </div>
        
        <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
               <h2 class="text-center">Contact Us</h2>
                
            </div> 
        
            <div class="panel-body">
            <form action="contact-us.php" method="post">
            <div class="form-group text-center">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" required>
                
            </div>
                
                <div class="form-group text-center">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" required>
                
            </div>
                
                <div class="form-group text-center">
                <label>Subject:</label>
                <input type="text" class="form-control" name="subject" required>
                
            </div>
                
                <div class="form-group text-center">
                <label>Message:</label>
                <textarea class="form-control" name="message"></textarea>
                
            </div>
                
                <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success btn-lg"> 
                    <i class="fa fa-user-md"></i> Send Us A Message
                </button>
                </div>
            
            </form>
            </div>
            </div>
            
            
            
            <?php 
            if(isset($_POST['submit'])){



                    $sender_name = $_POST['name'];
                    $sender_email = $_POST['email'];
                    $sender_subject = $_POST['subject'];
                    $sender_message = $_POST['message'];
                    $receiver_email = "slyck420ryck@gmail.com";
                    mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

                    $email = $_POST['email'];
                    $subject = "Welcome to Shop & Drop";
                    $message = "We shall reply to your message soon enough.";
                    $from = "leog1494@gmail.com";
                    mail($email,$subject,$messsage,$from);
                   echo "<h2 align='center'>Your message has been sent successfully</h2>";

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