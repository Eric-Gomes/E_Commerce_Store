<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<nav class="navbar navbar-inverse navbar-fixed-top">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    
<span class="sr-only">Navigation</span>    
<span class="icons"></span>    
<span class="icons"></span>    
<span class="icons"></span>    
    
</button>    

<a class="navbar-brand" href="index.php?dashboard">Admin</a>    
    
</div>
    
<ul class="nav navbar-right top-nav">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      
      <i class="fa fa-user"></i>
      <?php echo $admin_name; ?> <b class="caret"></b>
      
    </a>
    
    <ul class="dropdown-menu">
      <li>
        <a href="index.php?user_profile=<?php echo $admin_id; ?>">
          <i class="fa fa-fw fa-user"></i> Profile
            
        </a>
        
      </li>
        
        <li>
        <a href="index.php?view_products">
          <i class="fa fa-fw fa-envelope"></i> Products
            <span class="badge"><?php echo $count_product; ?></span>
        </a>
        
      </li>
        
        <li>
        <a href="index.php?view_customers">
          <i class="fa fa-fw fa-gear"></i> Customers
            <span class="badge"><?php echo $count_customer; ?></span>
        </a>
        
      </li>
        
        <li>
        <a href="index.php?view_product_category">
          <i class="fa fa-fw fa-gear"></i> Product Categories
            <span class="badge"><?php echo $count_product_categories; ?></span>
        </a>
        
      </li>
        
        <li class="divider"></li>
        <li>
        <a href="admin-logout.php">
        <i class="fa fa-fw fa-power-off"></i> Logout
        </a>
        
        </li>
      
      
    </ul>  
    
    
  </li>  
    
    
</ul>    
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
        <a href="index.php?dashboard">
           <i class="fa fa-fw fa-dashboard"></i> Dashboard        
        </a>
        </li>
        
        <li>
        
        <a href="#" data-toggle="collapse" data-target="#products">
            <i class="fa fa-fw fa-table"></i> Products
            <i class="fa fa-fw fa-caret-down"></i>
        </a>    
            
        <ul id="products" class="collapse">
        <li>
            <a href="index.php?insert_product">Insert Product</a>    
        </li>    
            
            <li>
            <a href="index.php?view_product">View Product</a>    
        </li> 
            
        </ul>    
            
        </li>
        
          <li>
        
        <a href="#" data-toggle="collapse" data-target="#product_category">
            <i class="fa fa-fw fa-pencil"></i> Product Categories
            <i class="fa fa-fw fa-caret-down"></i>
        </a>    
            
        <ul id="product_category" class="collapse">
        <li>
            <a href="index.php?insert_product_category">Insert Product Category</a>    
        </li>    
            
            <li>
            <a href="index.php?view_product_category">View Product Categories</a>    
        </li> 
            
        </ul>    
            
        </li>
        
          <li>
        
        <a href="#" data-toggle="collapse" data-target="#categories">
            <i class="fa fa-fw fa-arrows-v"></i> Categories
            <i class="fa fa-fw fa-caret-down"></i>
        </a>    
            
        <ul id="categories" class="collapse">
        <li>
            <a href="index.php?insert_category">Insert Category</a>    
        </li>    
            
            <li>
            <a href="index.php?view_category">View Categories</a>    
        </li> 
            
        </ul>    
            
        </li>
        
          <li>
        
        <a href="#" data-toggle="collapse" data-target="#slides">
            <i class="fa fa-fw fa-gear"></i> Slides
            <i class="fa fa-fw fa-caret-down"></i>
        </a>    
            
        <ul id="slides" class="collapse">
        <li>
            <a href="index.php?insert_slide">Insert Slide</a>    
        </li>    
            
            <li>
            <a href="index.php?view_slide">View Slides</a>    
        </li> 
            
        </ul>    
            
        </li>
        
        <li>
        <a href="index.php?view_customer">
            <i class="fa fa-fw fa-edit"></i> View Customers
        </a>
        
        </li>
        
        <li>
        <a href="index.php?view_order">
            <i class="fa fa-fw fa-list"></i> View Order
        </a>
        
        </li>
        
        <li>
        <a href="index.php?view_payment">
            <i class="fa fa-fw fa-pencil"></i> View Payment
        </a>
        
        </li>
        
         <li>
        
        <a href="#" data-toggle="collapse" data-target="#users">
            <i class="fa fa-fw fa-gear"></i> Users
            <i class="fa fa-fw fa-caret-down"></i>
        </a>    
            
        <ul id="users" class="collapse">
        <li>
            <a href="index.php?insert_user">Insert User</a>    
        </li>    
            
            <li>
            <a href="index.php?view_user">View Users</a>    
        </li> 
            
            <li>
            <a href="index.php?edit_user=<?php echo $admin_id; ?>">Edit  Profile</a>    
        </li> 
            
            <li class="divider"></li>
        <li>
        <a href="admin-logout.php">
        <i class="fa fa-fw fa-power-off"></i> Logout
        </a>
        
        </li>
          
            
        </ul>    
            
        </li>
        
          
        
        
    </ul>
    
    
    
    </div>


</nav>

<?php } ?>