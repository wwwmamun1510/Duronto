<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';

?>
<?php
require '../db.php';

$select_projects= "SELECT * FROM projects";
$select_projects_result = mysqli_query($db_connect, $select_projects);
?>
<?php if($_SESSION['role'] != 0){?>
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
  </nav>

  <div class="sl-pagebody">
     
  <div class="row">
      <div class="col-lg-12 m-auto">
         <div class="card">
          <div class="card-header bg-primary text-center">
            <h3 class="text-white">Projects Information Details<a href="../logout.php" class="btn btn-danger  float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($select_projects_result as $key=>$project){?>
            <tr>
              <th scope="row"><?= $key+1?></th>
              <td><?=$project['title']?></td>
              <td><?=$project['description']?></td>
             <td>
                <img width="100" src="../uploads/projects/<?= $project['image']?>" alt="">
             </td>
             <td>
                 <a href="project_edit.php?id=<?= $project['id']?>" class="btn btn-secondary">Edit</a>
                 <a href='project_delete.php?id=<?= $project['id']?>' class="btn btn-danger">Delete</a>
            </td>
            </tr>
           <?php }?>
          </tbody>
        </table>
      </div>
     </div>
  </div>
</div>
</div>
<?php }?>
<?php require '../dashboard_includes/footer.php'; ?>
<script>
  $('.delete_btn').click(function(){
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
 if (result.isConfirmed) {
   window.location.href=$(this).attr('id');
  }
  })
  });
 </script>
 <?php if(isset($_SESSION['delete_project'])){?> 
 <script>
  Swal.fire(
      'Deleted!',
      'Do not worry......Your file has been deleted .',
      'success'
    )
</script>
 <?php } unset($_SESSION['delete_project']) ?> 

 