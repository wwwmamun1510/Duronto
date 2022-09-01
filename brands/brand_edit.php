<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_brand= "SELECT * FROM brands WHERE id=$id";
$select_brand_result =  mysqli_query($db_connect, $select_brand);
$after_assoc = mysqli_fetch_assoc ($select_brand_result);

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
                    <h3>Edit Brand Information</h3>
                </div>
                <div class="card-body">
                <form action="brand_update.php" method="POST" enctype="multipart/form-data"> 
               <input name="id" class="d-none" value="<?=$after_assoc['id']?>" type="text">
                <div class="form-group">
                <label for="" class="form-label-control">Present Image</label>
                <br>
                <img width="300" src="../uploads/brands/<?=$after_assoc['image']?>" alt="">
                </div>
                <div class="form-group">
                <label for="" class="form-label-control">Brand Image</label>
                <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Your Brand</button>
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
<?php if(isset($_SESSION['update_brand'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your Brand Updated',
  text: '<?= $_SESSION['update_brand']?>',
 
})
</script>
<?php } unset($_SESSION['update_brand']) ?>


<?php if(isset($_SESSION['extension'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your Brand Updated',
  text: '<?= $_SESSION['extension']?>',
 
})
</script>
<?php } unset($_SESSION['extension']) ?>


<?php if(isset($_SESSION['file_size'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your Brand Updated',
  text: '<?= $_SESSION['file_size']?>',
 
})
</script>
<?php } unset($_SESSION['file_size']) ?>