<?php
require '../dashboard_includes/header.php';
require '../session_check.php';


?>
<?php
require '../db.php';

$select_areas = "SELECT * FROM areas WHERE status=0 ";
$select_areas_result = mysqli_query($db_connect, $select_areas);

// print_r($select_banners_result);
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
        <h3 class="text-white">Area Information<a href="../logout.php" class="btn btn-danger float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Image</th>
              <th scope="col">status</th>
              <th scope="col">Action</th>
              
              
            </tr>
          </thead>
          <tbody>

            <?php foreach($select_areas_result as $key=>$area){?>
              <tr>
           <td><?=$key+1?></td>
              <td>
                  <img width="100" src="../uploads/areas/<?= $area['area']?>" alt="">
                </td>

                <?php if($area['area_status']==1){?>
                  <td>
                       <a href="area_status.php?id=<?=$area['id'];?>" class="btn btn-success">Active</a>
                       </td>
                <?php } else{?>
                  <td>
                  <a href="area_status.php?id=<?=$area['id'];?>" class="btn btn-secondary">Deactive</a>
                  </td>
                <?php } ?>
                <td>
                 <a href="area_edit.php?id=<?= $area['id']?>" class="btn btn-secondary">Edit</a>
                 <a href='area_delete.php?id=<?= $area['id']?>' class="btn btn-danger">Delete</a>
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




 <?php if(isset($_SESSION['delete_area'])){?> 
 <script>
  Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
</script>
 <?php } unset($_SESSION['delete_area']) ?> 

  