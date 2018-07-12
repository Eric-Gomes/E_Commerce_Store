<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
if(isset($_GET['edit_product_category'])) {
$edit_product_category_id = $_GET['edit_product_category'];
$edit_product_category = "SELECT * from product_categories where product_category_id='$edit_product_category_id'";
$run_edit_product_category = mysqli_query($con, $edit_product_category);
$row_edit_product_category = mysqli_fetch_array($run_edit_product_category);
$product_category_id = $row_edit_product_category['product_category_id'];    
$product_category_title = $row_edit_product_category['product_category_title'];    
$product_category_description = $row_edit_product_category['product_category_description'];    
}    
    
    
?>    

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li>
      <i class="fa fa-dashboard"></i> Edit Product Category   
     </li>
     
    </ol>
 </div>

</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title">
          <i class="fa fa-money"></i>Edit Product Category
          
         </h3>
      </div>
        
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">
             <div class="form-group">
               <label class="col-md-3 control-label">Product Category Title</label>
                 <div class="col-md-6">
                  <input type="text" name="product_category_title" class="form-control" value="<?php echo $product_category_title; ?>">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label">Product Category Description</label>
                 <div class="col-md-6">
                  <textarea type="text" name="product_category_description" class="form-control">
                    <?php echo $product_category_description; ?> 
                  </textarea>
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label"></label>
                 <div class="col-md-6">
                  <input type="submit" name="update" class="btn btn-success form-control" value="Update Now">
                 </div>
             </div>
            
          </form>
        </div>
    </div>
 </div>

</div>

<?php 
    
if(isset($_POST['update'])) {
$product_category_title =$_POST['product_category_title'];    
$product_category_description = $_POST['product_category_description'];   

$update_product_category = "UPDATE product_categories set product_category_title='$product_category_title', product_category_description='$product_category_description' where product_category_id='$product_category_id'";
$run_product_category = mysqli_query($con, $update_product_category);
if($run_product_category) {
    echo "<script>alert('Product category has been updated')</script>";
    echo "<script>window.open('index.php?view_product_category','_self')</script>";
}    
    
}    
    
    
    
?>    


<?php } ?>