<div class="box">
<?php
    
$session_email = $_SESSION['customer_email'];    
$select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";    
$run_customer = mysqli_query($con, $select_customer);   
$row_customer = mysqli_fetch_assoc($run_customer);    
$customer_id = $row_customer['customer_id'];    
    
?>
    
    
<h1 class="text-center">Payment Please</h1>
<p class="text-center">
<a href="orders.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a>    
</p>
    
    

</div> 