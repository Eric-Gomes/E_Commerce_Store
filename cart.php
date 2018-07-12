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
         echo $_SESSION['customer_email'] . "";
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

<li class="active">
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
            
            <li>Shopping Cart</li>
          
        </ul>
        
      </div>
        
        <div class="col-md-12" id="cart">
        <div class="box">
            <form action="cart.php" method="POST" enctype="multipart-form-data">
            <h1>Shopping Cart</h1>
                
                <?php
                $address = getUserIP();
                $select_cart = "SELECT * FROM cart WHERE address='$address'";
                $run_cart = mysqli_query($con, $select_cart);
                $count = mysqli_num_rows($run_cart);
                
                ?>
                <p class="text-muted">You have <?= $count; ?> items in your cart</p>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th colspan="2">Product</th>
                        <th>Quantity:</th>    
                        <th>Price:</th>    
                        <th>Size:</th>
                            
                            
                            <th colspan="2">Total:</th>
                        
                        </tr>
                    
                    
                    </thead>
                    
                    <tbody>
                        
                        <?php
                        $total = 0;
                        while($row_cart = mysqli_fetch_assoc($run_cart)) {
                        $product_id = $row_cart['product_id'];
                        $product_size = $row_cart['size'];    
                        $product_quantity = $row_cart['quantity'];
                        $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
                        $run_product = mysqli_query($con, $get_product);
                        while ($row_product = mysqli_fetch_assoc($run_product)) {
                        $product_title = $row_product['product_title'];
                        $product_image1 = $row_product['product_image1'];    
                        $product_price = $row_product['product_price']; 
                        $sub_total = $row_product['product_price']*$product_quantity;
                        $total += $sub_total;    
    
                        ?>
                    <tr>
            <td><img src="admin/productimage/<?= $product_image1; ?>"></td>
                        
            <td><a href="#"><?= $product_title; ?></a></td>
                        
            <td><?= $product_quantity; ?></td>
                        
            <td>$<?= $product_price; ?>.00</td>
                        
            <td><?= $product_size; ?></td>
                        
            <td>$<?= $sub_total; ?>.00</td>
                        
                    </tr>
                        
                <?php } } ?>
                       
                    
                    </tbody>
                    
                    <tfoot>
                    <tr>
                        <th colspan="5">Total</th>
                        <th colspan="2">$<?= $total; ?>.00</th>
                    </tr>
                    
                    </tfoot>
                    
                </table>
                
                </div>
                
                 
            
            </form>
            
        </div>
            
         
            
            <hr>
            
           
        
        <div class="panel panel-info col-md-12">
        <div class="panel-heading" id="order-summary">
        <h1 class="panel-title text-center">Order Summary</h1>
        </div>

            <p class="text-muted">
            Shipping costs vary. 
            </p>
            
            <div class="table-responsive">
             <table class="table">
                <tbody>
                 <tr>
                    
                 <td>Order Total</td>
                     
                     <th>$<?= $total; ?>.00</th>
                 </tr>
                    
                    <tr>
                     <td>Shipment</td>
                        <td>$0.00</td>
                    </tr>
                 
                    <tr>
                    <td>Tax</td>
                    <th>$0.00</th>
                    </tr>
                    
                    <tr class="total">
                    <td>Total</td>
                    <th>$<?= $total; ?>.00</th>
                    </tr>
                    
                </tbody>
                
             </table>
            </div>
            
            
        
        </div>
            
             <div class="panel">
                <div class="pull-left">
                      <a href="index.php" class="btn btn-default">
                    <i class="fa fa-chevron-left"></i> Continue Shopping
                    
                      </a>
               </div>
                    
                <div class="pull-right">
        
                    
        <a href="checkout.php" class="btn btn-default">Proceed To Checkout
        <i class="fa fa-chevron-right"></i>
        </a>
                      
                </div>
                
                  </div>
            
            <br>
            
        <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-info">
             <div class="panel-heading">
              <h1>Products you may like</h1>
             </div>
                
                <div class="panel-body">
                    <?php
                $get_product = "SELECT * FROM products order by 1 DESC LIMIT 0,5";
                $run_product = mysqli_query($con,$get_product);
                while($row_product=mysqli_fetch_assoc($run_product)){
                $product_id = $row_product['product_id'];
                $product_title = $row_product['product_title'];
                $product_price = $row_product['product_price'];
                $product_image1 = $row_product['product_image1'];

                echo "
                       <div class='center-responsive col-md-3 col-sm-6'>
                        <div class='product same-height'>
                         <a href='details.php?product_id=$product_id'>
                          <img src='admin/productimage/$product_image1' class='img-responsive'>
                         </a>

                        <div class='text'>
                         <h3><a href='details.php?product_id=$product_id' >$product_title</a></h3>
                          <p class='price' >$$product_price</p>
                        </div>
                      </div>
                     </div>
                     "; 
                }
                  ?>  
                </div>
            </div>
            
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
    