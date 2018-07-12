<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('admin-login.php','_self')</script>";    
} else {
    

?>

<?php

if(isset($_GET['edit_slide'])){
$edit_slider_id = $_GET['edit_slide'];
$edit_slider = "SELECT * from slider where slider_id='$edit_slider_id'";
$run_slider_edit = mysqli_query($con, $edit_slider);
$row_slider_edit = mysqli_fetch_array($run_slider_edit);
$slider_id = $row_slider_edit['slider_id'];
$slider_name = $row_slider_edit['slider_name'];
$slider_image = $row_slider_edit['slider_image'];
    
}    
    
?>    

<div class="row">
 <div class="col-lg-12">
    <ol class="breadcrumb">
     <li class="active">
        <i class="fa fa-dashboard"></i> Edit Slides 
     </li>
    </ol>
 </div>        
</div>   
    
    <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">
             <i class="fa fa-money fa-fw"></i> Edit Slides
             </h3> 
        </div>
            
            <div class="panel-body">
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label class="col-md-3 control-label">Slide Name</label>
                 <div class="col-md-6">
                  <input type="text" value="<?php echo $slider_name; ?>" name="slide_name" class="form-control">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label">Slide Image</label>
                 <div class="col-md-6">
                  <input type="file" name="slide_image" class="form-control">
                     <img src="slideimage/<?php echo $slider_image; ?>" width="60" height="60">
                 </div>
             </div>
              
              <div class="form-group">
               <label class="col-md-3 control-label"></label>
                 <div class="col-md-6">
                  <input type="submit" name="update" class="btn btn-success form-control" value="Edit Slide">
                 </div>
             </div>
            
          </form>
        </div>

            
<?php 
    
if(isset($_POST['update'])) {
$slide_name = $_POST['slider_name'];    
$slide_image = $_FILES['slider_image']['name'];    
$temp_name = $_FILES['slider_image']['tmp_name'];

move_uploaded_file($temp_name, "slideimage/$slide_image");
$update_slider = "UPDATE slider set slider_name='$slider_name', slider_image='$slider_image' where slider_id='$slider_id'";   
$run_slider = mysqli_query($con, $update_slider);

if($run_slider){
    echo "<script>alert('Slide has been updated')</script>";
    echo "<script>window.open('index.php?view_slide','_self')</script>";
}    
    
    
}    
    
    
    
?>    

<?php } ?>