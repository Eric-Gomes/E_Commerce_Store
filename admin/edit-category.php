<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php
    
if(isset($_GET['edit_category'])) {
$edit_category_id = $_GET['edit_category'];
$edit_category = "SELECT * from categories where category_id='$edit_category_id'";
$run_edit_category = mysqli_query($con, $edit_category);
$row_edit_category = mysqli_fetch_array($run_edit_category);
$category_id = $row_edit_category['category_id'];    
$category_title = $row_edit_category['category_title'];    
$category_description = $row_edit_category['category_description'];    
}    
    
    
?>    

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li>
      <i class="fa fa-dashboard"></i> Edit Category   
     </li>
     
    </ol>
 </div>

</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title">
          <i class="fa fa-money"></i>Edit Category
          
         </h3>
      </div>
        
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">
             <div class="form-group">
               <label class="col-md-3 control-label"> Category Title</label>
                 <div class="col-md-6">
                  <input type="text" name="product_category_title" class="form-control" value="<?php echo $category_title; ?>">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label"> Category Description</label>
                 <div class="col-md-6">
                  <textarea type="text" name="product_category_description" class="form-control">
                    <?php echo $category_description; ?> 
                  </textarea>
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label"></label>
                 <div class="col-md-6">
                  <input type="submit" name="update" class="btn btn-success form-control" value="Update Category">
                 </div>
             </div>
            
          </form>
        </div>
    </div>
 </div>

</div>

<?php 
    
if(isset($_POST['update'])) {
$category_title =$_POST['category_title'];    
$category_description = $_POST['category_description'];   

$update_category = "UPDATE categories set category_title='$category_title', category_description='$category_description' where category_id='$category_id'";
$run_category = mysqli_query($con, $update_category);
if($run_category) {
    echo "<script>alert('Category has been updated')</script>";
    echo "<script>window.open('index.php?view_category','_self')</script>";
}    
    
}    
    
    
    
?>    


<?php } ?>