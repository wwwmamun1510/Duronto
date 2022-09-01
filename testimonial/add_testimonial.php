<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../db.php';

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
              <h5>Add Testimonial</h5>
              </div>
              <div class="card-body">
          <form action="testimonial_post.php" method= "POST" enctype="multipart/form-data">
           <div class="form-group">
              <label form="">Testimonial_Image</label>
              <input type="file" name="image" class="form-control">
          </div>
          <div class="form-group">
             <label form="">Description</label>
             <textarea  name="description" class="form-control"> </textarea>
           </div>
           <div class="form-group">
            <label form="">Name</label>
            <input type="text" name="name" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Designation</label>
              <input type="text" name="designation" class="form-control">
           </div>
           <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Add Testimonial</button>
           </div>
        </form>
     </div>
   </div>
</div>
<?php 
   require '../dashboard_includes/footer.php'; 
?>
<?php if(isset($_SESSION['testimonial_added'])) {?>

<script>

Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?= $_SESSION['testimonial_added']?>',
 
})
</script>
<?php } unset($_SESSION['testimonial_added']) ?>


