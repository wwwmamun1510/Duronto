<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_area= "SELECT * FROM areas WHERE id=$id";
$select_area_result =  mysqli_query($db_connect, $select_area);
$after_assoc = mysqli_fetch_assoc ($select_area_result);

?>
<div class="sl-mainpanel">
   <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dashboard</a>
         </nav>
          <div class="sl-pagebody">
          <div class="row">
            <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Area Information</h3>
                </div>
                <div class="card-body">
                <form action="area_update.php" method="POST" enctype="multipart/form-data"> 
                <input name="id" class="d-none" value="<?=$after_assoc['id']?>" type="text">
                <div class="form-group">
                <label for="" class="form-label-control">Present Area</label>
                <br>
                <img width="300" src="../uploads/areas/<?=$after_assoc['area']?>" alt="">
                </div>
                <div class="form-group">
                <label for="" class="form-label-control">Area Image</label>
                <input type="file" name="image" class="form-control">
                <?php if(isset($_SESSION['extension'])){?>
                  <div class="alert alert-warning">
                     <?=$_SESSION['extension']?>
                  </div>
               <?php }unset($_SESSION['extension']) ?>
               <?php if(isset($_SESSION['file_size'])){?>
                  <div class="alert alert-warning">
                     <?=$_SESSION['file_size']?>
                  </div>
               <?php } unset($_SESSION['file_size']) ?>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Your Area</button>
                </div>
                </form>
                </div>
             </div>
         </div>
      </div>
    </div>
  </div>
<?php
require '../dashboard_includes/footer.php';
?>