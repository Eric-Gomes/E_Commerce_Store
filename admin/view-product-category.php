<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> View Product Category
     </li>
     
    </ol>
 </div>

</div>

<div class="row">
 <div class="col-lg-12">
    <div class="panel panel-default">
     <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> View Product Categories
         </h3>
        </div>
        
        <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
               <tr>
                <th>Product Category ID</th>   
                <th>Title</th>   
                <th>Description</th>   
                <th>Edit Product Category</th>   
                <th>Delete Product Category</th>   
               </tr>
                
                
                
              </thead>
                
                <tbody>
                <?php
                   $i=0;
                   $get_product_category = "SELECT * from product_categories";
                   $run_product_category = mysqli_query($con, $get_product_category);    
            while ($row_product_category = mysqli_fetch_array($run_product_category)) {
$product_category_id = $row_product_category['product_category_id'];
$product_category_title = $row_product_category['product_category_title'];
$product_category_description = $row_product_category['product_category_description'];
$i++;
                       
    
                  ?>
                    
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $product_category_title; ?></td>
                    <td width="300"><?php echo $product_category_description; ?></td>
                    <td>
                    <a href="index.php?edit_product_category=<?php echo $product_category_id; ?>"> 
                    <i class="fa fa-pencil"></i> Edit    
                        </a>
                        
                    </td>
                        <td>
                        <a href="index.php?delete_product_category=<?php echo $product_category_id; ?>"> 
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