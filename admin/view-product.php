<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>
<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard / View Product
     </li>
    </ol>
 </div>

</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-money fa-fw"></i> View Product
        </h3>
      </div>
        
        <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                 <th>Product ID</th>  
                 <th>Title</th>  
                 <th>Image</th>  
                 <th>Price</th>  
                 <th>Sold</th>  
                 <th>Keyword</th>  
                 <th>Date</th>  
                 <th>Delete Product</th>  
                 <th>Edit Product</th>  
                  
                </tr>
              </thead>
             
                <tbody>
                 <?php
                $i=0;
                 $get_product = "SELECT * from products";
                 $run_product = mysqli_query($con, $get_product);
        while ($row_product = mysqli_fetch_array($run_product)) {       
                 $product_id = $row_product['product_id']; 
                 $product_title = $row_product['product_title']; 
                 $product_image = $row_product['product_image1']; 
                 $product_price = $row_product['product_price']; 
                 $product_keyword = $row_product['product_keyword']; 
                 $product_date = $row_product['date']; 
                 $i++;
    
                  ?>
                <tr>
                 <td><?php echo $i; ?></td>    
                 <td><?php echo $product_title; ?></td>    
                 <td><img src="productimage/<?php echo $product_image; ?>" width="60" height="60"></td>    
                 <td>$<?php echo $product_price; ?></td>    
                <td>
                <?php
                     $get_sold_product = "SELECT * from pending_order where product_id='$product_id'";
                     $run_sold_product = mysqli_query($con, $get_sold_product);
                     $count_product = mysqli_num_rows($run_sold_product);
                     echo $count_product;
                 ?>
                </td>    
                 <td><?php echo $product_keyword; ?></td>    
                 <td><?php echo $product_date; ?></td>   
                 <td>
                 <a href="index.php?delete_product=<?php echo $product_id; ?>">
                    <i class="fa fa-trash-o"></i> Delete Product
                 </a>   
                 </td> 
                    
                 <td>
                 <a href="index.php?edit_product=<?php echo $product_id; ?>">
                    <i class="fa fa-pencil"></i> Edit Product 
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