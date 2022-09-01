<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_facts= "SELECT * FROM facts WHERE id=$id";
$select_facts_result =  mysqli_query($db_connect, $select_facts);
$after_assoc = mysqli_fetch_assoc ($select_facts_result);

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
                    <h3>Edit Fact Information</h3>
                </div>
                <?php if(isset($_SESSION['update_fact'])){?>
                  <div class="alert alert-success">
                     <?=$_SESSION['update_fact']?>
                  </div>
               <?php }unset($_SESSION['update_fact']) ?>
                <div class="card-body">
           <form action="fact_update.php" method="POST" enctype="multipart/form-data"> 
           <div class="form-group">
           <label form="">icon</label>
           <input  type="text" name="icon" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Digit</label>
               <input  type="number" name="digit" class="form-control">
           </div>
           <div class="form-group">
              <label form="">Title</label>
               <input type="text" name="title" class="form-control">
            </div>

            <?php if(isset($_SESSION['file_size'])){?>
                  <div class="alert alert-warning">
                     <?=$_SESSION['file_size']?>
                  </div>
               <?php } unset($_SESSION['file_size']) ?>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
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
<?php if(isset($_SESSION['update_fact'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your Fact Updated',
  text: '<?= $_SESSION['update_fact']?>',
 
})
</script>
<?php } unset($_SESSION['update_fact']) ?>