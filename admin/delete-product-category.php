<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
if(isset($_GET['delete_product_category'])) {
    $delete_product_category_id = $_GET['delete_product_category'];
    $delete_product_category = "DELETE from product_categories where product_category_id='$delete_product_category_id'";
    $run_delete = mysqli_query($con, $delete_product_category);
    
    if($run_delete) {
        echo "<script>alert('This category has been removed')</script>";
        echo "<script>window.open('index.php?view_product_category','_self')</script>";
    } 


}    
    
?>


<?php } ?>