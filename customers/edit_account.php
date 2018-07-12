<?php

$customer_session = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_country = $row_customer['customer_country'];
$customer_city = $row_customer['customer_city'];
$customer_contact = $row_customer['customer_contact'];
$customer_address = $row_customer['customer_address'];
$customer_image = $row_customer['customer_image'];


?>


<div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">Edit Your Account</h2>
            </div>
       
            
         <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                
            <div class="form-group text-center">
                <label>Name:</label>
                <input type="text" class="form-control" name="c_name" required value="<?php echo $customer_name; ?>">
                
                
            </div>
                
                <div class="form-group text-center">
                <label>Email:</label>
                <input type="text" class="form-control" name="c_email" required value="<?php echo $customer_email; ?>">
                <small id="emailid" class="form-text text-muted">We will never share your email with anyone else.</small>    
                
            </div>
                
               
                
                <div class="form-group text-center">
                <label>Country:</label>
                <input type="text" class="form-control" name="c_country" required value="<?php echo $customer_country; ?>">
                
            </div>
                
                <div class="form-group text-center">
                <label>City:</label>
                <input type="text" class="form-control" name="c_city" required value="<?php echo $customer_city; ?>">
                
            </div>
                
                <div class="form-group text-center">
                <label>Address Line 1:</label>
                <input type="text" class="form-control" name="c_address" required value="<?php echo $customer_address; ?>">
                
            </div>
                
                
                
                <div class="form-group text-center">
                <label>Contact:</label>
                <input type="text" class="form-control" name="c_contact" required value="<?php echo $customer_contact; ?>">
                
            </div>
                
                <div class="form-group text-center">
                <label>Upload Image:</label>
                <input type="file" class="form-control-file" name="c_image" required> <br>
                <img src="customer-image/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive">    
                
            </div>
                
                <div class="text-center">
                <button name="update" class="btn btn-success"> 
                    <i class="fa fa-user"></i>  Update Your Account
                    
                    </button>
                </div>
            
            </form>
</div>
             </div>
        </div>

<?php
if(isset($_POST['update'])){
$update_id = $customer_id;
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_address = $_POST['c_address'];
$c_contact = $_POST['c_contact'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
move_uploaded_file($c_image_tmp,"customer-image/$c_image");
$update_customer = "UPDATE customers set customer_name='$c_name', customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_address='$c_address',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";    
$run_customer = mysqli_query($con, $update_customer);
if($run_customer) {
    echo "<script>alert('Account has been updated')</script>";
    echo "<script>window.open('logout.php','_self')</script>";
}    
}


?>