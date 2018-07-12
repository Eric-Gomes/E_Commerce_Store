<div class="panel panel-primary sidebar-menu">
<?php
$customer_session = $_SESSION['customer_email'];    
$get_customer = "SELECT * FROM customers where customer_email='$customer_session'";    
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_assoc($run_customer);
$customer_image = $row_customer['customer_image'];    
$customer_name = $row_customer['customer_name'];    

if(!isset($_SESSION['customer_email'])){
    
} else {
    echo "
    <center>
    
    <img src='customer-image/$customer_image' class='img-responsive'>
    </center>
    <br>
    <h3 align='center' class='panel_title'>Name : $customer_name</h3>
    
    ";
}    
    
?>
    
    <div class="panel-body">
     <ul class="nav nav-pills nav-stacked">
        <li class="<?php if(isset($_GET['my_order'])) { echo "active"; } ?>">
         
        <a href="account.php?my_order"> <i class="fa fa-list"></i> My Orders</a> 
        </li>
         
          
         
          <li class="<?php if(isset($_GET['edit_account'])) { echo "active"; } ?>">
         
        <a href="account.php?edit_account"> <i class="fa fa-pencil"></i> Edit Account</a> 
        </li>
         
          <li class="<?php if(isset($_GET['change_password'])) { echo "active"; } ?>">
         
        <a href="account.php?change_password"> <i class="fa fa-user"></i> Change Password</a> 
        </li>
         
          <li class="<?php if(isset($_GET['delete_account'])) { echo "active"; } ?>">
         
        <a href="account.php?delete_account"> <i class="fa fa-ban"></i> Delete Account</a> 
        </li>
         
          <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        
     </ul>
    
    </div>
</div>