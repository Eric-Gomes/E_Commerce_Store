<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Insert Slides 
     </li>
    </ol>
 </div>        
</div>   
    
    <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">
             <i class="fa fa-money fa-fw"></i> Insert Slides
             </h3> 
        </div>
            
            <div class="panel-body">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label class="col-md-3 control-label">Slide Name</label>
                 <div class="col-md-6">
                  <input type="text" name="slide_name" class="form-control">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label">Slide Image</label>
                 <div class="col-md-6">
                  <input type="file" name="slide_image" class="form-control">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label"></label>
                 <div class="col-md-6">
                  <input type="submit" name="submit" class="btn btn-success form-control" value="Insert Slide">
                 </div>
             </div>
            
          </form>
        </div>

            
<?php 
    
if(isset($_POST['submit'])) {
$slide_name = $_POST['slide_name'];    
$slide_image = $_FILES['slide_image']['name'];    
$temp_name = $_FILES['slide_image']['tmp_name'];
$view_slide = "SELECT * from slider";
    
$run_slide = mysqli_query($con, $view_slide);
$count = mysqli_num_rows($run_slide);

if($count<4) {
move_uploaded_file($temp_name,"slideimage/$slide_image");

$insert_slide = "INSERT into slider (slide_name, slide_image) values ('$slide_name','$slide_image')";
$run_slide = mysqli($con, $insert_slide);

echo "<script>alert('Slide has been inserted.')</script>";
echo "<script>window.open('index.php?view_slide','_self')</script>";    
}   
    else {
        echo "<script>alert('Slide has already been inserted.')</script>";
    }
    
}    
    
    
    
?>    

<?php } ?>