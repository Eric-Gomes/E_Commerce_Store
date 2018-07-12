<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
    
if(isset($_GET['delete_slide'])) {
$delete_id = $_GET['delete_slide'];
$delete_slide = "DELETE from slider where delete_slide ='$delete_id'";
$run_delete_slide = mysqli_query($con, $delete_slide);
    
    if($run_delete_slide) {
        echo "<script>alert('This slide has been removed')</script>";
        echo "<script>window.open('index.php?view_slide','_self')</script>";
    }     
}    
    
?>




<?php } ?>