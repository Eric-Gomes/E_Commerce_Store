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

 <div class="col-md-6 offer"><a href="customers/account.php" >
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

<li class="active">
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
</ul>  <!-- navbar end -->

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
            
            <li>Shop</li>
          
        </ul>
        
      </div>
        
        <div class="col-md-3">
        
            <?php
            include ("includes/leftsidebar.php");
            ?>
        
        </div>
        
        <div class="col-md-9">
            
            <?php
            
            if(!isset($_GET['product_cat'])) {
                
            if(!isset($_GET['category'])) {
                
                echo "
            <div class='panel panel-info'>
                <div class='panel-heading'>
                <h1> Browse for all products.. </h1>
                </div>
            </div>
                ";
            }
            }
                
                ?>
        
        <div class="row">
           
            <?php
            if(!isset($_GET['product_cat'])) {
                
            if(!isset($_GET['category']))  {
                
            $per_page=6;
                
            if(isset($_GET['page'])) {
                
            $page = $_GET['page'];    
            } else {
                
            $page=1;    
            }   
            
            $start_from = ($page-1) * $per_page;
            $get_product = "SELECT * FROM products order by 1 DESC LIMIT $start_from,$per_page";    
            $run_product = mysqli_query($con,$get_product);
            while ($row_product = mysqli_fetch_array($run_product)) {
                
            $product_id = $row_product['product_id'];    
            $product_title = $row_product['product_title'];    
            $product_price = $row_product['product_price'];    
            $product_image1 = $row_product['product_image1'];   
                
            echo "
            
            <div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
             <a href='details.php?product_id=$product_id'>
              <img src='admin/productimage/$product_image1' class='img-responsive'>
              </a>
                <div class='text'>
                   <h3><a href='details.php?product_id=$product_id' >$product_title</a></h3>
                     <p class='price'>$$product_price</p>
                      <p class='buttons'>
                       <a href='details.php?product_id=$product_id' class='btn btn-info'>Details</a>
                        <a href='details.php?product_id=$product_id' class='btn btn-success'>
                          <i class='fa fa-shopping-cart'></i> Add To Cart
                        </a>
                      </p>
               </div>
             </div>
            </div>
            ";    
    
            }    
            ?>
            
            
            </div>
            
            <center>
            <ul class="pagination">
          
<?php
                
             $query = "SELECT * FROM products";

$result = mysqli_query($con,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li><a href='shop.php?page=1' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li><a href='shop.php?page=".$i."' >".$i."</a></li>";
};

echo "<li><a href='shop.php?page=$total_pages' >".'Last Page'."</a></li>";   
            }
                
            }
                
?>

                
            </ul>
            
            </center>
            
    
            <?php
                
                displayCategoryProduct();
                displayCategoryTitle();
                
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
    