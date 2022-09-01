<?php 
session_start();
require '../dashboard_includes/header.php'; 
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_educations= "SELECT * FROM educations WHERE id=$id";
$select_educations_result =  mysqli_query($db_connect, $select_educations);
$after_assoc = mysqli_fetch_assoc ($select_educations_result);

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
                    <h3>Edit Education Information</h3>
                </div>
                <?php if(isset($_SESSION['update_education'])){?>
                  <div class="alert alert-success">
                     <?=$_SESSION['update_education']?>
                  </div>
               <?php }unset($_SESSION['update_education']) ?>
                <div class="card-body">
                <form action="education_update.php" method="POST" enctype="multipart/form-data"> 
                <div class="form-group">
                <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                <label for="" class="form-label-control">Education_name</label>
                <input value="<?=$after_assoc['education_name']?>" type="text" name="education_name" class="form-control">
                </div>
               
                <div class="form-group">
                <label for="" class="form-label-control">percentage</label>
                <input value=<?=$after_assoc['percentage']?> type="text" name="percentage" class="form-control">
                </div>
               <div class="form-group">
                 <label form="">Education Year</label>
                 <input type="text" name="year" class="form-control">
               </div>
               <?php if(isset($_SESSION['file_size'])){?>
                  <div class="alert alert-warning">
                     <?=$_SESSION['file_size']?>
                  </div>
               <?php } unset($_SESSION['file_size']) ?>
                
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Your Education </button>
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
<?php if(isset($_SESSION['update_education'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your Education Updated',
  text: '<?= $_SESSION['update_education']?>',
 
})
</script>
<?php } unset($_SESSION['update_education']) ?>