<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_testimonial= "SELECT * FROM testimonials WHERE id=$id";
$select_testimonial_result =  mysqli_query($db_connect, $select_testimonial);
$after_assoc = mysqli_fetch_assoc ($select_testimonial_result);

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
                <h3>Edit Testimonial Information</h3>
                </div>
                <div class="card-body">
                <form action="testimonial_update.php" method="POST"> 
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
                <button type="submit" class="btn btn-primary">Update Your Testimonial</button>
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
<?php if(isset($_SESSION['update_testimonial'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your testimonial Updated',
  text: '<?= $_SESSION['update_testimonial']?>',
 
})
</script>
<?php } unset($_SESSION['update_testimonial']) ?>