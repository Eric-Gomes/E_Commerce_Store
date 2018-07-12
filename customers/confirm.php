<?php

include("includes/dbase.php");
include("functions/functions.php");
session_start();

if(!isset($_SESSION['customer_email'])) {
echo "<script>window.open('../checkout.php','_self')</script>";    
} else {
    
if(isset($_GET['order_id'])){
$order_id = $_GET['order_id'];    
}    
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

 <div class="col-md-6 offer"><a href="#">
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
  if(!isset($_SESSION['customer_email'])){
      echo "<a href='customer-registration.php'>New User?</a>";
  } else {
      echo "";
  }  
    
?>
</li>

<li> <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='../checkout.php'>Your Account</a>";
    } else {
        echo "<a href='account.php?my_order'>My Account</a>";
    }
    
    
    ?></li>

<li><a href="../cart.php">Shopping Cart</a></li>

<li><?php 
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='../checkout.php'>Login</a>";
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
<a href="../index.php">Home </a>
</li>

<li>
  <a href="../shop.php">Shop</a>
</li>

<li class="active">
   <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='../checkout.php'>Your Account</a>";
    } else {
        echo "<a href='account.php?my_order'>My Account</a>";
    }
    
    
    ?>
</li>

<li>
  <a href="../cart.php">Shopping Cart</a>
</li>

<li>
  <a href="../contact-us.php">Contact Us</a>
</li>
</ul>  

</div>  
<a class="btn btn-primary navbar-btn right" href="cart.php">
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
            
            <li>Account</li>
          
        </ul>
        
      </div>
        
        <div class="col-md-3">
        
            <?php
            include("includes/leftsidebar.php");
            ?>
        
        </div>
        
        <div class="col-md-9">
        
        <div class="panel panel-info">
            <div class="panel-heading">
            <h1 class="text-center">Confirm Payment</h1>
            </div>
            
            
            <div class="panel-body">
            <form action="confirm.php?update_id=<?= $order_id; ?>" method="post" enctype="multipart/form-data">
            
              <div class="form-group text-center">
                <label>Invoice No:</label>
                <input type="text" class="form-control" name="invoice_no" required>
            </div>
            
            <div class="form-group text-center">
                <label>Amount Sent:</label>
                <input type="text" class="form-control" name="amount_sent" required>
            </div>
            
            <div class="form-group text-center">
                <label>Select Payment Mode:</label>
                <select name="payment_mode" class="form-control">
                <option>Select Payment Mode</option>
                <option>Bank Code</option>
                <option>Pay by cash</option>
                <option>Credit Card</option>
                <option>Debit Card</option>
                </select>
                
            </div>
            
            <div class="form-group text-center">
                <label>Reference:</label>
                <input type="text" class="form-control" name="reference_number" required>
            </div>
            
            
            
            <div class="form-group text-center">
                <label>Payment Date:</label>
                <input type="text" class="form-control" name="date" required>
            </div>
                
            <div class="text-center">
                <button type="submit" name="confirm_payment" class="btn btn-success btn-lg">
                <i class="fa fa-user-md"></i> Confirm Payment
                </button>
            </div>    
            </form>
            </div>
            
            <?php
    if(isset($_POST['confirm_payment'])){
        $update_id = $_GET['update_id'];
        $invoice_number = $_POST['invoice_no'];
        $amount_to_pay = $_POST['amount_sent'];
        $payment_mode = $_POST['payment_mode'];
        $reference_number = $_POST['reference_number'];
        $code = $_POST['code'];
        $payment_date = $_POST['date'];
        $complete = "Completed";
        
        $insert_payment = "INSERT into payment (invoice_number, amount_to_pay, payment_mode, reference_number, code, payment_date) values ('$invoice_number','$amount_to_pay','$payment_mode','$reference_number','$code','$payment_date')";
        $run_payment = mysqli_query($con, $insert_payment);
        $update_customer_order = "UPDATE customer_order set order_status='$complete' where order_id='$update_id'";
        $run_customer_order = mysqli_query($con, $update_customer_order);
        $update_pending_order = "UPDATE pending_order set order_status='$complete' where order_id='$update_id'";
        $run_pending_order = mysqli_query($con, $update_pending_order);
        if($run_pending_order){
        echo "<script>alert('Payment recieved.')</script>";
        echo "<script>window.open('account.php?my_order', '_self')</script>";    
        }
    }
    
    
    
             ?>
            
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
    
<?php } ?>