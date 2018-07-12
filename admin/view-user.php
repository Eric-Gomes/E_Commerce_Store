<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> View Users
     </li>
    </ol>
 </div>
</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="panel-title">
         <i class="fa fa-money fa-fw"></i> View Users
        </h3>
     </div>
        
        <div class="panel-body">
            <div class="table-responsive">
             <table class="table table-bordered">
                <thead>
                 <tr>
                  <th>Name</th>   
                  <th>Email</th>   
                  <th>Image</th>   
                  <th>Country</th>   
                  <th>Occupation</th>   
                  <th>Delete</th>   
                 </tr> 
                </thead>
                 
                 <tbody>
                 <?php
                       $get_admin = "SELECT * from admin";
                       $run_admin = mysqli_query($con, $get_admin);
    while ($row_admin = mysqli_fetch_array($run_admin)) {
                       $i=0;
                       $admin_id = $row_admin['admin_id'];
                       $admin_name = $row_admin['admin_name'];
                       $admin_email = $row_admin['admin_email'];
                       $admin_image = $row_admin['admin_image'];
                       $admin_country = $row_admin['admin_country'];
                       $admin_occupation = $row_admin['admin_occupation'];
                       
                 ?>
                     
                     <tr>
                     <td><?php echo $admin_name; ?></td>
                     <td><?php echo $admin_email; ?></td>
                     <td><img src="adminimage/<?php echo $admin_image; ?>" width="60" height="60"></td>
                     <td><?php echo $admin_country; ?></td>
                     <td><?php echo $admin_occupation; ?></td>
                         
                    <td>
                    <a href="index.php?delete_user=<?php echo $admin_id;?>">
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