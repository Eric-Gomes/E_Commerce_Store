   <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
              <h1 class="text-center">Change Your Password</h1>
            </div>
            
            
           <div class="panel-body">
            <form action="" method="POST">
            <div class="form-group text-center">
                <label>Enter Current Password:</label>
                <input type="text" class="form-control" name="old_password" required >
                
                
            </div>
                
                <div class="form-group text-center">
                <label>Enter New Password:</label>
                <input type="text" class="form-control" name="new_password" required >
                
            </div>
                
                <div class="form-group text-center">
                <label>Enter New Password Verification:</label>
                <input type="text" class="form-control" name="new_password_again" required >
                
            </div>
                
               
                
                <div class="text-center">
                <button type="submit" name="update" class="btn btn-success"> 
                    <i class="fa fa-user"></i>  Change Password
                    
                    </button>
                </div>
            
            </form>
       </div>
               </div>

        </div>

<?php
if(isset($_POST['update'])){
$c_email = $_SESSION['customer_email'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_again = $_POST['new_password_again'];
$select_old_password = "SELECT * FROM customers WHERE customer_password='$old_password'";
$run_old_password = mysqli_query($con,$select_old_password);
$check_old_password = mysqli_num_rows($run_old_password);
if($check_old_password==0){
echo "<script>alert('Your Current Password is not valid try again')</script>";
exit();
}

if($new_password!=$new_password_again){
echo "<script>alert('Your New Password does not match')</script>";
exit();
}

$update_password = "UPDATE customers set customer_password='$new_password' WHERE customer_email='$c_email'";
$run_password = mysqli_query($con,$update_password);

if($run_password){
echo "<script>alert('your Password Has been Changed Successfully')</script>";
echo "<script>window.open('account.php?my_order','_self')</script>";


}




}

?>