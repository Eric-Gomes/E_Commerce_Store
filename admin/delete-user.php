<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
    
if(isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    $delete_user = "DELETE from admin where admin_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_user);
    
    if($run_delete) {
        echo "<script>alert('This user has been removed')</script>";
        echo "<script>window.open('index.php?view_order','_self')</script>";
    } 


}    
    
?>

<?php } ?>