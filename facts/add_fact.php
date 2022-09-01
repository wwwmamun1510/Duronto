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
              <h5>Add Fact Area</h5>
              </div>
              <div class="card-body">
            <form action="fact_post.php" method= "POST">
           <div class="form-group">
           <label form="">Icon</label>
               <input type="text" name="icon" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Digit</label>
               <input type="number" name="digit" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Title</label>
               <input type="text" name="title" class="form-control">
           </div>
          <div class="form-group">
           <button type="submit" class="btn btn-primary d-block">Add Your Fact Area</button>
           </div>
        </form>
     </div>
   </div>
</div>
<?php 
   require '../dashboard_includes/footer.php'; 
?>
<?php if(isset($_SESSION['fact_added'])) {?>

<script>

Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '<?= $_SESSION['fact_added']?>',
 
})
</script>
<?php } unset($_SESSION['fact_added']) ?>


