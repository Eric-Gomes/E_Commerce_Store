<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>


<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> View Category
     </li>
     
    </ol>
 </div>

</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> View Categories
         </h3>
        </div>
        
        <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                <th>Category ID</th>   
                <th>Title</th>   
                <th>Description</th>   
                <th>Edit Category</th>   
                <th>Delete Category</th>   
               </tr>
                
                
                
              </thead>
                
                <tbody>
                <?php
                       $i=0;
                       $get_category = "SELECT * from categories";
                       $run_category = mysqli_query($con, $get_category);
                       while ($row_category = mysqli_fetch_array($run_category)) {
                           $category_id = $row_category['category_id'];
                           $category_title = $row_category['category_title'];
                           $category_description = $row_category['category_description'];
                       $i++;
                ?>           
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $category_title; ?></td>
                    <td width="300"><?php echo $category_description; ?></td>
                    <td>
                    <a href="index.php?edit_category=<?php echo $category_id; ?>"> 
                    <i class="fa fa-pencil"></i> Edit    
                        </a>    
                    </td>
                        
                    <td>
                    <a href="index.php?delete_category=<?php echo $category_id; ?>"> 
                    <i class="fa fa-trash-o"></i> Delete    
                    </a>  
                    </td>    
                    
                    </tr>
    
                
                
                    <?php } ?>
                </tbody>

<?php } ?>