<div class="panel panel-primary col-lg-12">
 <div class="box-header">
    
    <h1 class="text-center">Login</h1>
    
    </div>

<form action="checkout.php" method="post">
    <div class="form-group">
     <label>Email:</label>
    <input type="text" class="form-control" name="c_email" required>
    </div>
    
    <div class="form-group">
     <label>Password:</label>
    <input type="password" class="form-control" name="c_password" required>
    </div>
    
      <div class="text-center">
                <button value="Login" name="login" class="btn btn-success"> 
                    <i class="fa fa-sign-in"></i>  Login!
                    
                    </button>
                </div>
    
    </form>

    <center>
    
        <a href="customer-registration.php">
        
        <h3>Register Now.</h3>
        </a>
    </center>


</div>

<?php
if(isset($_POST['login'])) {
    $customer_email = $_POST['c_email'];
    $customer_password = $_POST['c_password'];
    $select_customer = "SELECT * from customers where customer_email='$customer_email' AND customer_password='$customer_password'";
    $run_customer = mysqli_query($con, $select_customer);
    $get_ip = getUserIP();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "SELECT * from cart where address='$get_ip'";
    $run_cart = mysqli_query($con, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0){
        echo "<script>alert('password or email in incorrect')</script>";
    exit();    
    }
    
    if($check_customer==1 AND $check_cart==0){
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('customers/account.php?my_order','_self')</script>";

    } else {
        
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>