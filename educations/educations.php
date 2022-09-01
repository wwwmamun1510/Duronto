<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';

?>
<?php
require '../db.php';

$select_educations = "SELECT * FROM educations";
$select_educations_result = mysqli_query($db_connect, $select_educations);

// print_r($select_educations_result);
// die();
?>
<?php if($_SESSION['role'] != 0){?>
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
  </nav>

  <div class="sl-pagebody">
     <div class="card mt-5">
      <div class="card-header bg-primary text-center">
        <h3 class="text-white">Education Information<a href="../logout.php" class="btn btn-danger  float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Education Name</th>
              <th scope="col">Percentage</th>
              <th scope="col">Year</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($select_educations_result as $key=>$education){?>
            <tr>
              <th scope="row"><?= $key+1?></th>

              <td><?=$education['education_name']?></td>
              <td><?=$education['percentage']?></td>
              <td><?=$education['year']?></td>
             <td>

             <?php if($education['education_status'] == 1){?>
                     
              <a href="education_status.php?id=<?= $education['id']?>" class="btn btn-success">Active</a>
            <?php } else{?>
              <a href="education_status.php?id=<?= $education['id']?>" class="btn btn-secondary">Deactive</a>
            <?php } ?>
             </td>
              <td>
                 <a href="education_edit.php?id=<?= $education['id']?>" class="btn btn-secondary">Edit</a>
                 <a href='education_delete.php?id=<?= $education['id']?>' class="btn btn-danger">Delete</a>
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

<?php if(isset($_SESSION['delete_education'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your education Deleted',
  text: '<?= $_SESSION['delete_education']?>',
 
})
</script>
<?php } unset($_SESSION['delete_education']) ?>
