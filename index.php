<?php

session_start();

include("includes/dbase.php");
include("functions/functions.php");

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
    if(!isset($_SESSION['customer_email'])){                                 // IF CUSTOMER EMAIL IS NOT LOGGED IN, DISPLAY NEW USER? ELSE OUTPUT NOTHING. 
      echo "<a href='customer-registration.php'>New User?</a>";
  } else {
      echo "";
  }  
    
?>
</li>

<li>
  <?php
    if(!isset($_SESSION['customer_email'])){                                      //IF CUSTOMER EMAIL IS NOT SET IN THE SESSION, ECHO OUT ACCOUNT. ELSE DISPLAY MY ACCOUNT. 
        echo "<a href='checkout.php'>Account</a>";
    } else {
        echo "<a href='customers/account.php?my_order'>My Account</a>";
    }
    
    
    ?>

</li>

    

<li><?php 
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
    
    <div class="jumbotron">
  <div class="container text-center">
    <h1>Shop & Drop</h1>      
    <p>Buy our stuff..</p>
  </div>
</div>
    
<div class="navbar navbar-inverse col-lg-12 center" id="nav"> 
<div class="container"> 

<div class="navbar-header">
<a class="navbar-brand home" href="index.php"></a> 

 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle Navigation</span>
<i class="fa fa-align-justify"></i>
 </button>

 
</div> 

<div class="navbar-collapse collapse justify-content-md-center" id="navigation"> 
<div class="padding-nav"> 
<ul class="nav navbar-nav navbar-left"> 
<li class="active">
<a href="index.php">Home </a>
</li>

<li>
  <a href="shop.php">Shop</a>
</li>

<li>
  <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'> Account</a>";
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
    
   
    
<div class="container" id="slider"> 
 <div class="col-md-12">
  <div id="mycarousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators"> 
           <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
           <li data-target="#mycarousel" data-slide-to="1"></li>
           <li data-target="#mycarousel" data-slide-to="2"></li>
           <li data-target="#mycarousel" data-slide-to="3"></li>

       </ol>
      <div class="carousel-inner">
           
          <?php
          $get_slides = "SELECT * FROM slider LIMIT 0,1";
          $run_slides = mysqli_query($con,$get_slides);
          while($row_slides=mysqli_fetch_array($run_slides)) {
              
              $slide_name = $row_slides['slider_name'];
              $slide_image = $row_slides['slider_image'];

              echo "
              
              <div class='item active'>
              <img src='admin/slideimage/$slide_image'>
              
              </div>
              ";
              
          }
          
          ?>
          
           <?php
          $get_slides = "SELECT * FROM slider LIMIT 1,3";
          $run_slides = mysqli_query($con,$get_slides);
          while($row_slides=mysqli_fetch_array($run_slides)) {
              
              $slide_name = $row_slides['slider_name'];
              $slide_image = $row_slides['slider_image'];

              echo "
              
              <div class='item'>
              <img src='admin/slideimage/$slide_image'>
              
              </div>
              ";
              
          }
          
          ?>
          
          
      
      </div>
      <a class="let carousel-control" href="#mycarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only"> Previous</span>
      </a> 
      
      <a class="right carousel-control" href="#mycarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
      </a>
  </div> 
 </div>
</div> 
    
<div class="row"> 
 <div class="col-lg-12">
    <div class="panel panel-info">
     <div class="panel-heading">
        <h2 class="text-center">Latest Products</h2>
     </div>
    </div>
 </div>    
</div>    
    
    <div id="content" class="container"> 
     <div class="row"> 
       
        <?php
         displayProduct();
         
         ?>
     </div> 
    
    </div>
    
<?php
include("includes/footer.php");    
?>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>



</html>
