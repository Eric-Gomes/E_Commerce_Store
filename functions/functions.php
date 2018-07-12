<?php
$db = mysqli_connect("localhost","root","","ecommercestore");

//-------------------------------------------------------------------------


function getUserIP(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];    
    
    }
}

//-------------------------------------------------------------------------
function displayProduct() {
    
    global $db;
    
    $sql = "SELECT * FROM products order by 1 DESC LIMIT 0,12";
    $run_products = mysqli_query($db, $sql);
    while ($row_products = mysqli_fetch_assoc($run_products)) {
        
        $product_id = $row_products['product_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_image1 = $row_products['product_image1'];
        
    echo "
    
    <div class='col-md-2'>
    <div class='product'>
    <a href='details.php?product_id=$product_id'>
    <img src='admin/productimage/$product_image1' class='img-responsive'>
    </a>
    
    <div class='text'>
    <h3><a href='details.php?product_id=$product_id'>$product_title</a></h3>
    <p class='price'>$$product_price</p>
    <p class='button'>
    <a href='details.php?product_id=$product_id' class='btn btn-info'>Details</a>
    </p>
    </div>
    </div>
    </div>
    ";
        
    }
}

//--------------------------------------------------------------------------------
function displayProductCategories() {
    
    global $db;
    $sql = "SELECT * FROM product_categories";
    $run_product_categories = mysqli_query($db, $sql);
    while ($row_product_categories = mysqli_fetch_array($run_product_categories)) {
        
    $product_category_id = $row_product_categories['product_category_id'];
    $product_category_title = $row_product_categories['product_category_title'];
    
    echo "<li><a href='shop.php?product_cat=$product_category_id'>$product_category_title</a></li>";    
    }
    
}

//--------------------------------------------------------------------------------

function displayCategories() {
    global $db;
    $get_categories = "SELECT * FROM categories";
    $run_categories = mysqli_query($db, $get_categories);
    while ($row_categories = mysqli_fetch_array($run_categories)) {
    
    $category_id = $row_categories['category_id'];
    $category_title = $row_categories['category_title'];
        
    echo "<li><a href='shop.php?category=$category_id'>$category_title</a></li>";    
    }
}
//--------------------------------------------------------------------------------

function displayCategoryProduct() {
    global $db;
    if(isset($_GET['product_cat'])) {
    $product_category_id = $_GET['product_cat'];    
    $get_product_category = "SELECT * FROM product_categories WHERE product_category_id='$product_category_id'";
    $run_product_category = mysqli_query($db, $get_product_category);
    $row_product_category = mysqli_fetch_array($run_product_category);
    $product_category_title = $row_product_category['product_category_title'];
    $product_category_description = $row_product_category['product_category_description'];    
        
    $get_product = "SELECT * FROM products where product_category_id='$product_category_id'";
    $run_product = mysqli_query($db,$get_product);
    $count = mysqli_num_rows($run_product);
        
    if($count==0){
    
    echo "
    <div class='box'>
    <h1> No Product Found </h1>
    </div>
    
    ";    
    } else {
    
    echo "
    <div class='box'>
    <h1>$product_category_title</h1>
    <p>$product_category_description</p>
    </div>
    ";    
    }
        
    while($row_product = mysqli_fetch_array($run_product)) {
    $product_id = $row_product['product_id'];    
    $product_title = $row_product['product_title'];    
    $product_price = $row_product['product_price'];    
    $product_image1 = $row_product['product_image1'];    

        echo "
    
    <div class='col-md-4 col-sm-6 center-responsive'>
    <div class='product'>
    <a href='details.php?product_id=$product_id'>
    <img src='admin/productimage/$product_image1' class='img-responsive'>
    </a>
    
    <div class='text'>
    <h3><a href='details.php?product_id=$product_id'>$product_title</a></h3>
    <p class='price'>$$product_price</p>
    <p class='button'>
    <a href='details.php?product_id=$product_id' class='btn btn-info'>Details</a>
    <a href='details.php?product_id=$product_id' class='btn btn-success'>
    <i class='fa fa-shopping-cart'></i>Add To Cart
    </a>
    </p>
    </div>
    </div>
    </div>
    ";
            
    }    
        
    }
    
}
//-------------------------------------------------------------------------------------

function displayCategoryTitle() {
    global $db;
    if(isset($_GET['category'])){
    $category_id = $_GET['category'];
    $get_category = "SELECT * FROM categories WHERE category_id='$category_id'";
    $run_category = mysqli_query($db, $get_category);
    $row_category = mysqli_fetch_array($run_category);
    $category_title = $row_category['category_title'];
    $category_description = $row_category['category_description']; 
        
    $get_product = "SELECT * from products where category_id='$category_id'"; 
    $run_product = mysqli_query($db, $get_product);
    $count = mysqli_num_rows($run_product);   
        
    if($count==0){
        
    echo "
    <div class='box'>
    <h1>No Product Found</h1>
    </div>
    ";    
    } else {
        echo "
        <div class='box'>
        <h1>$category_title</h1>
        <p>$category_description</p>
        </div>
        ";
    }
        
    while($row_product = mysqli_fetch_array($run_product)) {
    $product_id = $row_product['product_id'];    
    $product_title = $row_product['product_title'];    
    $product_price = $row_product['product_price'];   
    $product_description = $row_product['product_description'];    
    $product_image1 = $row_product['product_image1'];    
        
    echo "
    <div class='col-md-4 col-sm-6 center-responsive'>
    <div class='product'>
    <a href='details.php?product_id=$product_id'>
    <img src='admin/productimage/$product_image1' class='img-responsive'>
    </a>
    
    <div class='text'>
    <h3><a href='details.php?product_id=$product_id'>$product_title</a></h3>
    <p class='price'>$$product_price</p>
    <p class='button'>
    <a href='details.php?product_id=$product_id' class='btn btn-info'>Details</a>
    <a href='details.php?product_id=$product_id' class='btn btn-success'>
    <i class='fa fa-shopping-cart'></i>Add To Cart
    </a>
    </p>
    </div>
    </div>
    </div>
    
    
    
    ";    
    }    
    }
}

//----------------------------------------------------------------------------
function addToCart() {
    global $db;
    if(isset($_GET['addToCart'])) {
        $address = getUserIP();
        $product_id = $_GET['addToCart'];
        $product_quantity = $_POST['product_quantity'];
        $product_size = $_POST['product_size'];
        
        $check_product = "SELECT * FROM cart WHERE address='$address' AND product_id='$product_id'";
        $run_check_product = mysqli_query($db, $check_product);
        if(mysqli_num_rows($run_check_product)>0) {
            echo "<script>alert('Product is already in cart')</script>";
            echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";
        }
        else {
            $query = "INSERT INTO cart (product_id,address,quantity,size) VALUES ('$product_id','$address','$product_quantity','$product_size')";
            $run_query = mysqli_query($db, $query);
            echo "<script>window.open('details.php?product_id=$product_id','_self')</script>";
        }
    }
}

//------------------------------------------------------------------------------------
function getItems() {
    global $db;
    $address = getUserIP();
    $get_item = "SELECT * FROM cart WHERE address='$address'";
    $run_item = mysqli_query($db, $get_item);
    $count_item = mysqli_num_rows($run_item);
    echo $count_item;
}

//---------------------------------------------------------------------------------------
 function price() {
     global $db;
     $address = getUserIP();
     $total = 0;
     $select_cart = "SELECT * FROM cart WHERE address='$address'";
     $run_cart = mysqli_query($db, $select_cart);
     while ($record=mysqli_fetch_array($run_cart)) {
     $product_id = $record['product_id']; 
     $product_quantity = $record['quantity']; 
         $get_price = "SELECT * from products WHERE product_id='$product_id'";
         $run_price = mysqli_query($db, $get_price);
         while ($row_price=mysqli_fetch_array($run_price)) {
             $sub_total = $row_price['product_price']*$product_quantity;
             $total += $sub_total;
         }
     
     }
     
     echo "$".$total;
 }
?>