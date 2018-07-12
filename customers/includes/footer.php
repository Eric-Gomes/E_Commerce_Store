<br>
<br>
<hr>

<div id="footer"> <!-- footer starts -->
 <div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <h4>In Store Pages</h4>
        
            <li> <a href="../cart.php">Shopping Cart</a></li>
            <li><a href="../shop.php">Shop</a></li>
            <li> <?php
    if(!isset($_SESSION['customer_email'])){
        echo "<a href='../checkout.php'>Your Account</a>";
    } else {
        echo "<a href='account.php?my_order'>My Account</a>";
    }
    
    
    ?></li>
        
      
        
        
        
        
        <hr class="hidden-md hidden-lg hidden-sm">
        <hr class="hidden-md hidden-lg hidden-sm">
    </div>
      
      <div class="col-md-3 col-sm-6">
      <h4>Categories</h4>
          
          
          
             <?php
              $get_cats = "SELECT * FROM categories";
              $run_cats = mysqli_query($con, $get_cats);
              while($row_cats = mysqli_fetch_array($run_cats)) {
                  $cat_id = $row_cats['category_id'];
                  $cat_title = $row_cats['category_title'];
                  echo "<li><a href='shop.php?p_cat=$cat_id'> $cat_title</a></li>";
              }
              
              
            ?>
          
          
      
      </div>
      
      <div class="col-md-3 col-sm-6">
      <h4>Where to find us</h4>
          <p>
            <strong>Shop and Drop</strong>
          <br>Manchester
          <br>U.K      
            <strong>Eric Gomes </strong>  
              
          </p>
      <a href="../contact-us.php">Go to Contact us page</a>
          
          <hr class="hidden-md hidden-lg">
          
      </div>
      
      <div class="col-md-3 col-sm-6">
      <h4>Get the news</h4>
          
          <p class="text-muted">
          Hello there.
          
          </p>
          
          <form action="" method="post">
          
            <div class="input-group">
              
              <input type="text" class="form-control" name="email">
                <span class="input-group-btn">
                 <input type="submit" value="subscribe" class="btn btn-primary">
                
                </span>
              
            </div>  
              
          </form>
          
         
      
      </div>
      
      <div class="col-md-12">
       <hr>
          
          <h2 class="text-center">Stay in touch</h2>
          <p class="social text-center">
              
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              
          </p>
      
          <p class="pull-right" &copy; Shop & Drop 2018></p>
      
      
      
      
      </div>
      
      
  </div>    
 </div>
</div> <!-- footer endds -->

