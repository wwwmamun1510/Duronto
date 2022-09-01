<?php
session_start();
require '../dashboard_includes/header.php';
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_projects = "SELECT * FROM projects WHERE id=$id";
$select_projects_result =  mysqli_query($db_connect, $select_projects);
$after_assoc = mysqli_fetch_assoc($select_projects_result);

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
               <h3>Edit Project Information</h3>
               </div>
               <div class="card-body">
                  <form action="project_update.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                        <label for="" class="form-label-control">Project_Tittle</label>
                        <input value="<?= $after_assoc['title'] ?>" type="text" name="title" class="form-control">
                     </div>
                     <div class="form-group">
                        <label form="">Description</label>
                        <textarea value=<?=$after_assoc['description']?> type="text" name="description" class="form-control"> </textarea>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label-control">image</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <?php if (isset($_SESSION['file_size'])) { ?>
                        <div class="alert alert-warning">
                           <?= $_SESSION['file_size'] ?>
                        </div>
                     <?php }
                     unset($_SESSION['file_size']) ?>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary d-block">Submit Your Project</button>
               </div>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php
require '../dashboard_includes/footer.php';
?>
<?php if (isset($_SESSION['update_project'])) { ?>

   <script>
      Swal.fire({
         icon: 'Success',
         title: 'Do Not Worry...Your project Updated',
         text: '<?= $_SESSION['update_project'] ?>',

      })
   </script>
<?php }
unset($_SESSION['update_project']) ?>