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
              <h5>Add About Yourself</h5>
              </div>
              <div class="card-body">
            <form action="about_post.php" method= "POST">
            <div class="form-group">
            <label form="">Title</label>
            <input type="text" name="title" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Description</label>
              <textarea  name="description" class="form-control"> </textarea>
          </div>
          <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Submit About Yourself</button>
           </div>
        </form>
     </div>
   </div>
</div>
<?php 
   require '../dashboard_includes/footer.php'; 
?>
<?php if(isset($_SESSION['about_added'])) {?>

<script>

Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?= $_SESSION['about_added']?>',
 
})
</script>
<?php } unset($_SESSION['about_added']) ?>


