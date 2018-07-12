<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
    
if(isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];
    $delete_product = "DELETE from products where product_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_product);
    
    if($run_delete) {
        echo "<script>alert('This product has been removed')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    } 


}    
    
?>



<?php } ?>