<?php

session_start();
include("includes/dbase.php");

if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
    
$admin_session = $_SESSION['admin_email'];    
$get_admin =  "SELECT * from admin where admin_email='$admin_session'";
$run_admin = mysqli_query($con, $get_admin);
$row_admin = mysqli_fetch_array($run_admin);
$admin_id = $row_admin['admin_id'];    
$admin_name = $row_admin['admin_name'];
$admin_email = $row_admin['admin_email'];    
$admin_image = $row_admin['admin_image'];    
$admin_contact = $row_admin['admin_contact'];    
$admin_country = $row_admin['admin_country'];    
$admin_occupation = $row_admin['admin_occupation'];    
$admin_about = $row_admin['admin_about'];    

$get_product = "SELECT * from products";   
$run_product = mysqli_query($con, $get_product);
$count_product = mysqli_num_rows($run_product);    

$get_customer = "SELECT * from customers";
$run_customer = mysqli_query($con, $get_customer);
$count_customer = mysqli_num_rows($run_customer);

$get_product_categories = "SELECT * from product_categories";
$run_product_categories = mysqli_query($con, $get_product_categories);
$count_product_categories = mysqli_num_rows($run_product_categories);    
    
$get_pending_order = "SELECT * from pending_order";
$run_pending_order = mysqli_query($con, $get_pending_order);
$count_pending_order = mysqli_num_rows($run_pending_order);    
    
    
?>

<!DOCTYPE html>
<html>
 <head>
    
<title>Administrator</title>    
<link href="css/bootstrap.min.css" rel="stylesheet">    
<link href="css/main.css" rel="stylesheet">    
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">    
</head>

<body>
    
<div id="wrapper">
<?php include("includes/leftsidebar.php"); ?>    
 <div id="page-wrapper">
   <div class="container-fluid">
     <?php
       
       if(isset($_GET['dashboard'])) {
           include("dashboard.php");
       }
       
      if(isset($_GET['insert_product'])) {
          include("insert-product.php");
      }
    
     if(isset($_GET['view_product'])) {
         include("view-product.php");
     }
    
    if(isset($_GET['delete_product'])) {
         include("delete-product.php");
     }
    
    if(isset($_GET['edit_product'])) {
         include("edit-product.php");
     }
       
    if(isset($_GET['insert_product_category'])) {
         include("insert-product-category.php");
     }
    
    if(isset($_GET['view_product_category'])) {
         include("view-product-category.php");
     }
    
    if(isset($_GET['edit_product_category'])) {
         include("edit-product-category.php");
     }
    
    if(isset($_GET['delete_product_category'])) {
         include("delete-product-category.php");
     }
    
    if(isset($_GET['insert_category'])) {
         include("insert-category.php");
     }
    
    if(isset($_GET['view_category'])) {
         include("view-category.php");
     }
    
    if(isset($_GET['edit_category'])) {
         include("edit-category.php");
     }
    
    if(isset($_GET['delete_category'])) {
         include("delete-category.php");
     }
    
    if(isset($_GET['insert_slide'])) {
         include("insert-slide.php");
     }
    
     if(isset($_GET['view_slide'])) {
         include("view-slide.php");
     }
    
    if(isset($_GET['edit_slide'])) {
         include("edit-slide.php");
     }
    
    if(isset($_GET['delete_slide'])) {
         include("delete-slide.php");
     }
    
    if(isset($_GET['view_customer'])) {
         include("view-customer.php");
     }
    
    if(isset($_GET['view_order'])) {
         include("view-order.php");
     }
    
    if(isset($_GET['delete_order'])) {
         include("delete-order.php");
     }
    
    if(isset($_GET['view_payment'])) {
         include("view-payment.php");
     }
    
    if(isset($_GET['delete_payment'])) {
         include("delete-payment.php");
     }
    
    if(isset($_GET['insert_user'])) {
         include("insert-user.php");
     }
    
    if(isset($_GET['view_user'])) {
         include("view-user.php");
     }
    
    if(isset($_GET['delete_user'])) {
         include("delete-user.php");
     }
    
    if(isset($_GET['edit_user'])) {
         include("edit-user.php");
     }


       ?>
     
     
     
   </div>
    
    
    
</div>    
    
    
    
</div>    
    
    
    
    
    
    
    
    
    
    
    
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>    
</body>





</html>

<?php } ?>