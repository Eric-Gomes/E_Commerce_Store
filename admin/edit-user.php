<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

        
?>

<?php

if(isset($_GET['edit_user'])){

$edit_id = $_GET['edit_user'];
$get_admin = "SELECT * from admin where admin_id='$edit_id'";
$run_admin = mysqli_query($con, $get_admin);
$row_admin = mysqli_fetch_array($run_admin);
    
$admin_id = $row_admin['admin_id'];    
$admin_name = $row_admin['admin_name'];    
$admin_email = $row_admin['admin_email'];    
$admin_password = $row_admin['admin_password'];    
$admin_image = $row_admin['admin_image'];    
$admin_country = $row_admin['admin_country'];    
$admin_occupation = $row_admin['admin_occupation'];    
$admin_contact = $row_admin['admin_contact'];    
$admin_about = $row_admin['admin_about'];    
}    
    
?>    

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Edit User 
     </li>
    </ol>
 </div>    
</div>   
    
    <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">
             <i class="fa fa-money fa-fw"></i> Edit User
             </h3>
        </div>
            
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-md-3 control-label">User Name</label>
                      <div class="col-md-6">
                       <input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Email</label>
                      <div class="col-md-6">
                       <input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Password</label>
                      <div class="col-md-6">
                       <input type="password" name="admin_password" class="form-control" required>
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Country</label>
                      <div class="col-md-6">
                       <input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Occupation</label>
                      <div class="col-md-6">
                       <input type="text" name="admin_occupation" class="form-control" required value="<?php echo $admin_occupation; ?>">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Contact</label>
                      <div class="col-md-6">
                       <input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User About</label>
                      <div class="col-md-6">
                       <textarea name="admin_about" class="form-control" rows="3">
                        <?php echo $admin_about; ?>
                       </textarea>
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label">User Image</label>
                      <div class="col-md-6">
                       <input type="file" name="admin_image" class="form-control" required>
                          <br>
                          <img src="adminimage/<?php echo $admin_image; ?>" width="80" height="80">
                      </div>
                  </div>
                    
                    <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                      <div class="col-md-6">
                       <input type="submit" name="update" value="Edit User" class="form-control btn btn-success" required>
                      </div>
                  </div>
                </form>
            
            </div>
        </div>
    </div>
</div>

<?php
    
if(isset($_POST['update'])) {
$admin_name = $_POST['admin_name'];    
$admin_email = $_POST['admin_email'];    
$admin_password = $_POST['admin_password'];    
$admin_country = $_POST['admin_country'];    
$admin_occupation = $_POST['admin_occupation'];    
$admin_contact = $_POST['admin_contact'];    
$admin_about = $_POST['admin_about'];    
$admin_image = $_FILES['admin_image']['name'];    
$temp_admin_image = $_FILES['admin_image']['tmp_name'];    
move_uploaded_file($temp_admin_image, "adminimage/$admin_image");   
    
$update_admin = "UPDATE admin set admin_name='$admin_name', admin_email='$admin_email', admin_password='$admin_password', admin_image='$admin_image', admin_contact='$admin_contact', admin_country='$admin_country', admin_occupation='$admin_occupation', admin_about='$admin_about'";   
    
$run_admin = mysqli_query($con, $update_admin);
if($run_admin) {
    echo "<script>alert('Admin has been updated')</script>";
    echo "<script>window.open('login.php','_self')</script>";
    
session_destroy();    
}    
}   
    
    
?>


<?php } ?>