<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard / View Order
     </li>
    </ol>
 </div>

</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> View Order
        </h3>
      </div>
        
        <div class="panel-body">
         <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
               <tr>
                <th>Order</th>   
                <th>Email</th>   
                <th>Invoice</th>   
                <th>Product</th>   
                <th>Quantity</th>   
                <th>Size</th>   
                <th>Date</th>   
                <th>Total</th> 
                <th>Status</th>   
                <th>Delete</th>   
               </tr>   
              </thead>
                 
                 <tbody>
                  <?php
                       $i=0;
                       $get_order = "SELECT * from pending_order";
                       $run_order = mysqli_query($con, $get_order);
                    while ($row_order=mysqli_fetch_array($run_order)) {
                      $order_id = $row_order['order_id'];  
                      $customer_id = $row_order['customer_id'];  
                      $invoice_number = $row_order['invoice_number'];  
                      $product_id = $row_order['product_id'];  
                      $quantity = $row_order['quantity'];  
                      $size = $row_order['size'];  
                      $order_status = $row_order['order_status'];  
                      
                      $get_product = "SELECT * from products where product_id='$product_id'";
                      $run_product = mysqli_query($con, $get_product);
                      $row_product = mysqli_fetch_array($run_product);
                      $product_title = $row_product['product_title'];    
                      $i++;
                    ?>
                     
                     <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php 
                          $get_customer = "SELECT * from customers where customer_id='$customer_id'";
                          $run_customer = mysqli_query($con, $get_customer);
                          $row_customer = mysqli_fetch_array($run_customer);
                          $customer_email = $row_customer['customer_email'];
                          echo $customer_email;
                          ?></td>
                      <td bgcolor="yellow"><?php echo $invoice_number; ?></td>
                      <td><?php echo $product_title; ?></td>
                      <td><?php echo $quantity; ?></td>
                      <td><?php echo $size; ?></td>
                      <td>
                      <?php
                        $get_customer_order = "SELECT * from customer_order where order_id='$order_id'";
                        $run_customer_order = mysqli_query($con, $get_customer_order);
                        $row_customer_order = mysqli_fetch_array($run_customer_order);
                        $order_date = $row_customer_order['order_date'];
                        $amount = $row_customer_order['amount'];
                        echo $order_date;
                        ?>
                      </td>
                         <td>$<?php echo $amount; ?></td>
                         <td>
                         <?php
                        if($order_status=='pending') {
                            echo $order_status='pending';
                        } else {
                            echo $order_status='complete';
                        }
                         ?>
                         </td>
                         
                         <td>
                         <a href="index.php?delete_order=<?php echo $order_id; ?>">
                         <i class="fa fa-trash-o"></i> Delete     
                         </a>
                         </td>
                      
                     </tr>
                     
                     
                     <?php } ?>
                 </tbody>
             </table>
            
         </div>
        </div>
    </div>
 </div>
</div>

<?php } ?>