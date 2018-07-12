<?php



include("includes/dbase.php");
include("functions/functions.php");

?>

<?php


if(isset($_GET['c_id'])){
$customer_id = $_GET['c_id'];    
}

$ip_address = getUserIP();
$status = "pending";
$invoice_number = mt_rand();
$select_cart = "SELECT * FROM cart WHERE address='$ip_address'";
$run_cart = mysqli_query($con,$select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {
$product_id = $row_cart['product_id'];
$product_size = $row_cart['size'];
$product_quantity = $row_cart['quantity'];
$get_product = "SELECT * FROM products WHERE product_id='$product_id'";    
$run_product = mysqli_query($con, $get_product); 

while($row_product = mysqli_fetch_array($run_product)){
$sub_total = $row_product['product_price']*$product_quantity; 
    
$insert_customer_order = "INSERT INTO customer_order (customer_id, amount, invoice_number, quantity, size, order_date, order_status) VALUES ('$customer_id','$sub_total','$invoice_number','$product_quantity','$product_size',NOW(),'$status')";    
    
$run_customer_order = mysqli_query($con, $insert_customer_order); 
$insert_pending_order = "INSERT INTO pending_order (customer_id, invoice_number, product_id, quantity, size, order_status) VALUES ('$customer_id','$invoice_number','$product_id','$product_quantity','$product_size','$status')";  
$run_pending_order = mysqli_query($con, $insert_pending_order);
    
$delete_cart = "DELETE FROM cart WHERE address='$ip_address'";
$run_delete = mysqli_query($con, $delete_cart);

echo "<script>alert('Order is successful.')</script>";
echo "<script>window.open('customers/account.php?my_order','_self')</script>";    
}    
    
    
}
?>