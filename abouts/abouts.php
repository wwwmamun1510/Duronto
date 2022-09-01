<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';

?>
<?php
require '../db.php';

$select_abouts= "SELECT * FROM abouts";
$select_abouts_result = mysqli_query($db_connect, $select_abouts);

// print_r($select_abouts_result);
// die();
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
            <h3 class="text-white">Descripe About Yourself<a href="../logout.php" class="btn btn-danger float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($select_abouts_result as $key=>$about) { ?>
            <tr>
              <th scope="row"><?= $key+1?></th>
              <td><?=$about['title']?></td>
              <td><?=$about['description']?></td>
              <td>
              <?php if($about['about_status']==1){?>
                      <a href="about_status.php?id=<?=$about['id'];?>" class="btn btn-success">Active</a>
                <?php } else{?>
                  <a href="about_status.php?id=<?=$about['id'];?>" class="btn btn-secondary">Deactive</a>
                <?php } ?>
                 <a href="about_edit.php?id=<?= $about['id']?>" class="btn btn-secondary">Edit</a>
                 <a href='about_delete.php?id=<?= $about['id']?>' class="btn btn-danger">Delete</a>
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

<?php if(isset($_SESSION['delete_about'])) {?>

<script>

Swal.fire({
  icon: 'Success',
  title: 'Your about Deleted',
  text: '<?= $_SESSION['delete_about']?>',
 
})
</script>
<?php } unset($_SESSION['delete_about']) ?>
