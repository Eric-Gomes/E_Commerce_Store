<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>


<?php
if(isset($_GET['delete_category'])){
    $delete_category_id = $_GET['delete_category'];
    $delete_category = "DELETE from categories where category_id='$delete_category_id'";
    $run_delete = mysqli_query($con, $delete_category);
    
    if($run_delete) {
        echo "<script>alert('This category has been removed')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    } 


}  
    
    
?>    

<?php } ?>