<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Payments
     </li>
    </ol>
 </div>

</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> View Payments
        </h3>
      </div>
        
        <div class="panel-body">
            <div class="table-responsive">
             <table class="table table-bordered">
              <thead>
               <tr>
                  <th>Payment Number</th>
                  <th>Invoice</th>
                  <th>Amount Paid</th>
                  <th>Payment Method</th>
                  <th>Reference Number</th>
                  <th>Payment Code</th>
                  <th>Date</th>
                  <th>Delete</th>
               </tr>   
              </thead>
                 
                 <tbody>
                 <?php
             $i = 0;
    $get_payment = "SELECT * from payment";
    $run_payment = mysqli_query($con, $get_payment);
    while ($row_payment = mysqli_fetch_array($run_payment)) {
        $payment_id = $row_payment['payment_id'];
        $invoice_number = $row_payment['invoice_number'];
        $amount_to_pay = $row_payment['amount_to_pay'];
        $payment_mode = $row_payment['payment_mode'];
        $reference_number = $row_payment['reference_number'];
        $code = $row_payment['code'];
        $payment_date = $row_payment['payment_date'];
        $i++;
    
    
                  ?>
                     
                     <tr>
                     <td><?php echo $i; ?></td>
                     <td><?php echo $invoice_number; ?></td>
                     <td>$<?php echo $amount_to_pay; ?></td>
                     <td><?php echo $payment_mode; ?></td>
                     <td><?php echo $reference_number; ?></td>
                     <td><?php echo $code; ?></td>
                     <td><?php echo $payment_date; ?></td>
                     <td>   
                      <a href="index.php?delete_payment=<?php echo $payment_id;?>">
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