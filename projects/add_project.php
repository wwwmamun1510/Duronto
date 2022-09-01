<?php 
session_start();
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
              <h5>Add The Prototype Of Project</h5>
              </div>
              
          <div class="card-body">
           <form action="project_post.php" method= "POST" enctype="multipart/form-data">
          <div class="form-group">
           <label form="">Project_Tittle</label>
              <input type="text" name="tittle" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Description</label>
              <textarea  name="description" class="form-control"> </textarea>
           </div>
           <div class="form-group">
                <label form="">Project_Image</label>
                <input type="file" name="image" class="form-control">
           </div>
           <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Submit Your Project</button>
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