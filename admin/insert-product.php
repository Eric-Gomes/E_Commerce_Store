<?php

if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
?>


<!DOCTYPE html>
<html>

<head>
    
    
<title>Insert Product</title>    


    
</head>

<body>
    
<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Insert Product 
        
        
     </li>
     
    </ol>
 
 </div>    
    
</div>   
    
    <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">
             
             <i class="fa fa-money fa-fw"></i> Insert Products
             
             </h3>
            
            
        </div>
         
            <div class="panel-body">
             <form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                 <label class="col-md-3 control-label">Product Title</label>
                  <div class="col-md-6">
                    <input type="text" name="product_title" class="form-control" required>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Category</label>
                  <div class="col-md-6">
                    <select name="product_categories" class="form-control">
                      <option>Select Product Category</option>
                      <?php
                        $get_p_cats = "SELECT * from product_categories";
                        $run_p_cats = mysqli_query($con, $get_p_cats);
                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                            $p_cat_id = $row_p_cats['product_category_id'];
                            $p_cat_title = $row_p_cats['product_category_title'];
                            
                            echo "<option value = '$p_cat_id'>$p_cat_title</option>";

                        }
                        
                        ?>
                      </select>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Category</label>
                  <div class="col-md-6">
                    <select name="category" class="form-control">
                      <option>Select A Category</option>
                      <?php
                        $get_cat = "SELECT * from categories";
                        $run_cat = mysqli_query($con, $get_cat);
                        while ($row_cat = mysqli_fetch_array($run_cat)) {
                            $cat_id = $row_cat['category_id'];
                            $cat_title = $row_cat['category_title'];
                        echo "<option value = '$cat_id'>$cat_title</option>";    
                        }
                        ?>
                    </select>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Image 1</label>
                  <div class="col-md-6">
                    <input type="file" name="product_image1" class="form-control" required>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Image 2</label>
                  <div class="col-md-6">
                    <input type="file" name="product_image2" class="form-control" required>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Image 3</label>
                  <div class="col-md-6">
                    <input type="file" name="product_image3" class="form-control" required>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Price</label>
                  <div class="col-md-6">
                    <input type="text" name="product_price" class="form-control" required>
                    
                    
                    </div>
                 
                 </div>
                 
                  <div class="form-group">
                 <label class="col-md-3 control-label">Product Keyword</label>
                  <div class="col-md-6">
                    <input type="text" name="product_keyword" class="form-control" required>
                      
                    </div>
                 
                 </div>
                 
                 <div class="form-group">
                 <label class="col-md-3 control-label">Product Description</label>
                  <div class="col-md-6">
                    <textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
                      
                    </div>
                 
                 </div>
                 
                 <div class="form-group">
                 <label class="col-md-3 control-label"></label>
                  <div class="col-md-6">
                    <input type="submit" name="submit" class="btn btn-success form-control" value="Insert Product" required>
                      
                    </div>
                 
                 </div>
                
                
                </form>
            
            
            
            </div>
         
         </div>
        
        
    </div>
    
    
    </div>

    
  
    
    
</body>    


</html>

<?php

if(isset($_POST['submit'])) {
    
    $product_title = $_POST['product_title'];
    $product_categories = $_POST['product_categories'];
    $category = $_POST['category'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keyword = $_POST['product_keyword'];
    
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    
    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    $temp_name2 = $_FILES['product_image2']['tmp_name'];
    $temp_name3 = $_FILES['product_image3']['tmp_name'];

    move_uploaded_file($temp_name1, "productimage/$product_image1");
    move_uploaded_file($temp_name2, "productimage/$product_image2");
    move_uploaded_file($temp_name3, "productimage/$product_image3");

$insert_product = "INSERT into products
                  (product_category_id,
                  category_id,
                  date,
                  product_title,
                  product_image1,
                  product_image2,
                  product_image3,
                  product_price,
                  product_description,
                  product_keyword) 
                  
                  values
                  ('$product_categories',
                  '$category',
                  NOW(),
                  '$product_title',
                  '$product_image1',
                  '$product_image2',
                  '$product_image3',
                  '$product_price',
                  '$product_desc',
                  '$product_keyword')";

$run_product = mysqli_query($con, $insert_product);

if($run_product) {

echo "<script>alert('Product has been inserted')</script>";
echo "<script>window.open('index.php?insert_product','_self')</script>";    
    
}    

}

?>


    
    
    

<?php  } ?>