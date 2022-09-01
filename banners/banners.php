<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';

?>
<?php
require '../db.php';

$select_banners = "SELECT * FROM banners WHERE status=0 ";
$select_banners_result = mysqli_query($db_connect, $select_banners);
?>
<?php if($_SESSION['role'] != 0){?>
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
  </nav>

  <div class="sl-pagebody">
     <div class="card mt-5">
      <div class="card-header bg-primary text-center">
        <h3 class="text-white">The Shadow Team(Joint Intelligence Community)<a href="../logout.php" class="btn btn-warning  float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Button Name</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($select_banners_result as $key=>$banner){?>
            <tr>
              <th scope="row"><?= $key+1?></th>
              <td><?=$banner['title']?></td>
              <td><?=$banner['description']?></td>
              <td>
                <img width="100" src="../uploads/banners/<?= $banner['image']?>" alt="">
              </td>
              <td><?=$banner['btn']?></td>
              <td>
                <?php if($banner['img_status']==1){?>
                      <a href="banner_status.php?id=<?=$banner['id'];?>" class="btn btn-success">Active</a>
                <?php } else{?>
                  <a href="banner_status.php?id=<?=$banner['id'];?>" class="btn btn-secondary">Deactive</a>
                <?php } ?>
              </td>
              <td>
                
                <?php if($_SESSION['role'] != 3 ){?>
                     <a href="banner_edit.php?id=<?= $banner['id']?>" class="btn btn-secondary">Edit</a>
                <?php }?>
                <?php if($_SESSION['role'] == 1 ){?>
                      <a id='banner_soft_delete.php?id=<?= $banner['id']?>' class="btn btn-danger delete_btn">Delete</a>
                <?php }?>
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
<?php if(isset($_SESSION['soft_del_banner'])){?> 
 <script>
  Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
</script>
 <?php } unset($_SESSION['soft_del_banner']) ?> 

 <?php if(isset($_SESSION['delete_banners'])){?> 
 <script>
  Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
</script>
 <?php } unset($_SESSION['delete_banners']) ?> 

 <?php if(isset($_SESSION['banner_restore'])){?> 
 <script>
  Swal.fire(
      'restored!',
      'Your file has been restored.',
      'success'
    )
</script>
 <?php } unset($_SESSION['banner_restore']) ?> 