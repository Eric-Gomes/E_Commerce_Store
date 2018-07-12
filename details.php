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
         echo "Welcome" . $_SESSION['customer_email'] . "";
     }
     
     
     ?>
         
         </a>
      
     </div> 

    <div class="col-md-6"> 

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

    <li> <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='checkout.php'> Account</a>";
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
    <a class="navbar-brand home" href="index.php"></a>

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
    </ul>  <!-- navbar end -->

    </div>  
    <a class="navbar-btn right" href="cart.php">
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

                <li><a href="shop.php">Shop</a></li>
                
                <li><a href="shop.php?product_category_id=<?php echo $product_category_id; ?>"><?php echo $product_category_title; ?></a></li>
                
                <li> <?php echo $product_title; ?></li>

            </ul>

          </div>



            <div class="col-lg-12">
            <div class="row" id="mainProduct">
             <div class="col-lg-12">
                 <div id="mainproductImage">
                     <div id="productCarousel" class="carousel slide" data-ride="carousel">
                         <ol class="carousel-indicator">
                             <li data-target="#productCarousel" data-slide-to="0" class="active"></li>
                             <li data-target="#productCarousel" data-slide-to="1"></li>
                             <li data-target="#productCarousel" data-slide-to="2"></li>
                         </ol>

                         <div class="carousel-inner">
                          <div class="item active">
                             <center>
                               <img src="admin/productimage/<?php echo $product_image1; ?>" class="img-responsive">
                             </center>
                          </div>

                              <div class="item">
                             <center>
                               <img src="admin/productimage/<?php echo $product_image2; ?>" class="img-responsive">
                             </center>
                          </div>

                              <div class="item">
                             <center>
                               <img src="admin/productimage/<?= $product_image3; ?>" class="img-responsive">
                             </center>
                          </div>

                         </div>

                         <a href="#productCarousel" class="left carousel-control" data-slide="prev">
                             <span class="glyphicon glyphicon-chevron-left"></span>
                             <span class="sr-only">Previous</span>
                         </a>

                          <a href="#productCarousel" class="right carousel-control" data-slide="next">
                             <span class="glyphicon glyphicon-chevron-right"></span>
                             <span class="sr-only">Next</span>
                         </a>


                     </div>

                 </div>

            </div>   

            </div>
                
                </div>
            
            

   


               <div class="col-lg-12">
                 <div class="panel panel-info">
                    <h1 class="text-center"><?php echo $product_title; ?></h1>
                   <?php addToCart(); ?>
                     <form action="details.php?addToCart=<?php echo $product_id; ?>" method="post" class="form-horizontal">

                        <div class="form-group">
                         <label class="col-md-8 control-label">Product Quantity</label>

                            <div class="col-md-8">

                            <select name="product_quantity" class="form-control">
                                
                                <option>Select a Quantity</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>


                            </select>

                            </div>

                         </div> 

                         <div class="form-group">
                         <label class="col-md-5 control-label">Size</label>

                             <div class="col-md-7">
                             <select name="product_size" class="form-control">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <option>XtraLarge</option>
                            </select>


                             </div>
                         </div>
                         
                         <p class="price">$<?php echo $product_price; ?></p>
                         <p class="text-center button">
                         <button class="btn btn-success" type="submit">
                             <i class="fa fa-shopping-cart"></i> Add To Cart
                         </button>
                         
                         </p>

                     </form>
                 </div>   
                </div>
            
            <br>
            <br>
            <hr>
            
            <div class="row" id="thumbimage">
                    <div class="col-xs-4">
                        
                    <a href="#" class="thumbnail">
                     <img src="admin/productimage/<?php echo $product_image1; ?>" class="img-responsive">    
                    </a>    
                    </div>
                        
                        <div class="col-xs-4">
                        
                    <a href="#" class="thumbnail">
                     <img src="admin/productimage/<?php echo $product_image2; ?>" class="img-responsive">    
                    </a>    
                    </div>
                        
                        <div class="col-xs-4">
                        
                    <a href="#" class="thumbnail">
                     <img src="admin/productimage/<?php echo $product_image3; ?>" class="img-responsive">    
                    </a>    
                    </div>
                    
                    
                    </div>
            
            <div class="col-lg-12">
                    <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1>Product Details</h1>
                        <p><?php echo $product_description; ?></p>
                    </div>
                    </div>
                </div>
            
                
                
                
                <div id="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                         <div class="panel-heading">
                            <h1>Products you may LIKE</h1>
                         </div>  
                            
                            <div class="panel-body">
                              <?php 
                    $get_product = "SELECT * FROM products order by rand() LIMIT 0,4";
                    $run_product = mysqli_query($con, $get_product);
                    while($row_product = mysqli_fetch_array($run_product)) {
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
                        <h3><a href='details.php?product_id'>$product_title</a></h3>
                        <p class='price'>$$product_price</p>
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

    <?php
    include("includes/footer.php");    
    ?>




    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    </body>



    </html>

<?php
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    
    $product_category_id = $row_product['product_category_id'];
    $product_title = $row_product['product_title'];
    $product_price = $row_product['product_price'];
    $product_description = $row_product['product_description'];
    $product_image1 = $row_product['product_image1'];
    $product_image2 = $row_product['product_image2'];
    $product_image3 = $row_product['product_image3'];

    $get_product_category = "SELECT * FROM product_categories WHERE product_category_id='$product_category_id'";
    $run_product_category = mysqli_query($con, $get_product_category);
    $row_product_category = mysqli_fetch_assoc($run_product_category);
    $product_category_title = $row_product_category['product_category_title'];
}


?>
