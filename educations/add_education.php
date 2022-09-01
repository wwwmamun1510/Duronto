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
              <h5>Add Education</h5>
              </div>
              <div class="card-body">
              <form action="education_post.php" method= "POST">
              <div class="form-group">
              <label form="">Education Name</label>
               <input type="text" name="education_name" class="form-control">
           </div>
           <div class="form-group">
                <label form="">Education Percentage</label>
                <input type="text" name="percentage" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Education Year</label>
               <input type="text" name="year" class="form-control">
           </div>
          <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Educational Skill</button>
           </div>
        </form>
     </div>
   </div>
</div>
<?php 
   require '../dashboard_includes/footer.php'; 
?>
<?php if(isset($_SESSION['education_added'])) {?>

<script>

Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?= $_SESSION['education_added']?>',
 
})
</script>
<?php } unset($_SESSION['education_added']) ?>


