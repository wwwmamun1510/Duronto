<?php 

require '../dashboard_includes/header.php'; 
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
              <h5>Add Area</h5>
              </div>
              
              <div class="card-body">
              <form action="area_post.php" method= "POST" enctype="multipart/form-data">
             <div class="form-group">
                <label form="">Area_Image</label>
                <input type="file" name="area" class="form-control">
           </div>
          <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Add Your Area</button>
           </div>
        </form>
     </div>
   </div>
</div>
<?php 
   require '../dashboard_includes/footer.php'; 
?>
<?php if(isset($_SESSION['invalid_extension'])) {?>

<script>

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?= $_SESSION['invalid_extension']?>',
 
})
</script>
<?php } unset($_SESSION['invalid_extension']) ?>


<?php if(isset($_SESSION['size'])) {?>

<script>

Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?= $_SESSION['size']?>',
 
})
</script>
<?php } unset($_SESSION['size']) ?>

<?php if(isset($_SESSION['success'])) {?>

<script>

Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?= $_SESSION['success']?>',
 
})
</script>
<?php } unset($_SESSION['success']) ?>