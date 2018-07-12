<?php
$db = mysqli_connect("localhost","root","","ecommercestore");

function getProduct() {
    
    global $db;
    
    $get_products = "SELECT * from products order by 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db, $get_products);
    while ($row_products = mysqli_fetch_array($run_products)) {
        
        $product_id = $row_products['product_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_image1 = $row_products['product_image1'];
        
    echo "
    
    <div class='col-md-4 col-sm-6 single'>
    <div class='product'>
    <a href='details.php?product_id=$product_id'>
    <img src='admin/productimage/$product_image1' class='img-responsive'>
    </a>
    
    <div class='text'>
    <h3><a href='details.php?product_id=$product_id'>$product_title</a></h3>
    <p class='price'>$$product_price</p>
    <p class='button'>
    <a href='details.php?product_id=$product_id' class='btn btn-default'>View Details</a>
    <a href='details.php?product_id=$product_id' class='btn btn-primary'>
    <i class='fa fa-shopping-cart'></i>Add To Cart
    </a>
    </p>
    </div>
    </div>
    </div>
    ";
        
    }
}

function getItems() {
    global $db;
    $address = getUserIP();
    $get_item = "SELECT * from cart WHERE address='$address'";
    $run_item = mysqli_query($db, $get_item);
    $count_item = mysqli_num_rows($run_item);
    echo $count_item;
}

function price() {
     global $db;
     $address = getUserIP();
     $total = 0;
     $select_cart = "SELECT * from cart where address='$address'";
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

function getUserIP(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];    
    
    }
}

?>