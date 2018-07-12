<div class="panel panel-info col-lg-12">
 <div class="panel-heading">
    <h1 class="text-center">My Orders</h1>
 </div>
    
    <div class="panel-body">
    <p class="text-center">Orders on one page</p> 
       
        
    <div class="table-responsive">
        <table class="table table-striped table table-bordered">
         <thead>
            <tr>
             <th>Order Number</th>
             <th>Due Amount</th>
             <th>Invoice Number</th>
             <th>Quantity</th>
             <th>Size</th>
             <th>Purchase Date</th>
             <th>Status</th>
             <th>Click To Pay</th>
            </tr>
            
            
         </thead>
            
            <tbody>
                
                <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
                $run_customer = mysqli_query($con, $get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id = $row_customer['customer_id'];
                $get_order = "SELECT * FROM customer_order WHERE customer_id='$customer_id'";
                $run_order = mysqli_query($con, $get_order);
                
                $i = 0;
                while($row_order = mysqli_fetch_assoc($run_order)) {
                $order_id = $row_order['order_id'];
                $amount = $row_order['amount'];
                $invoice_number = $row_order['invoice_number'];
                $quantity = $row_order['quantity'];
                $size = $row_order['size'];
                $order_date = substr($row_order['order_date'],0,11);
                $order_status = $row_order['order_status'];
                $i++;
                
                if($order_status=='pending'){
                $order_status = "Unpaid";    
                }  else {
                    $order_status = "Paid";
                }  
                
    
                ?>
            <tr>
               <th><?= $i; ?></th> 
               <td>$<?= $amount; ?></td> 
               <td><?= $invoice_number; ?></td> 
               <td><?= $quantity; ?></td> 
               <td><?= $size; ?></td> 
               <td><?= $order_date; ?></td> 
               <td><?= $order_status; ?></td> 
               <td>
                <a href="confirm.php?order_id=<?= $order_id; ?>" target="blank" class="btn btn-success btn-sm">Pay</a>
                </td> 

                
            </tr>
                <?php } ?>
            
            </tbody>
    
        </table>
    
    
    </div>   
        
        <p class="text-muted"><a href="../contact-us.php">Contact us</a> if any problem.</p>
         
    </div>

</div>