<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li>
        <i class="fa fa-dashboard"></i> Insert Category
     </li>
     
    </ol>
 </div>
</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> Insert Category
        </h3>
      </div>
        
        <div class="panel-body">
         <form class="form-horizontal" action="" method="post">
           <div class="form-group">
             <label class="col-md-3 control-label">Category Title</label>
               <div class="col-md-6">
                <input type="text" name="category_title" class="form-control">
               </div>
           </div> 
            
             <div class="form-group">
             <label class="col-md-3 control-label">Category Description</label>
               <div class="col-md-6">
                <textarea type="text" name="category_description" class="form-control">
                   
                </textarea>
               </div>
           </div> 
             
             <div class="form-group">
             <label class="col-md-3 control-label"></label>
               <div class="col-md-6">
                <input type="submit" name="submit" value="Insert Category" class="form-control btn btn-success">
               </div>
           </div> 
             
             
         </form>
        </div>
    </div>
 </div>

</div>

<?php
    
if(isset($_POST['submit'])) {
$category_title = $_POST['category_title'];    
$category_description = $_POST['category_description'];
$insert_category = "INSERT into categories (category_title, category_description) values ('$category_title', '$category_description')";
$run_category = mysqli_query($con, $insert_category);
if($run_category) {
    echo "<script>alert('New Category has been inserted.')</script>";
    echo "<script>window.open('index.php?view_categories','_self')</script>";
}    
}    
    
    
?>    


<?php } ?>