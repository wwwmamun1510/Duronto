<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';

?>
<?php
require '../db.php';

$select_testimonial= "SELECT * FROM testimonials";
$select_testimonial_result = mysqli_query($db_connect, $select_testimonial);

// print_r($select_testimonials_result);
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
            <h3 class="text-white">Testimonial Information<a href="../logout.php" class="btn btn-danger float-right">Logout</a></h3>
      </div>
     <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Image</th>
              <th scope="col">description</th>
              <th scope="col">Name</th>
              <th scope="col">designation</th>
              <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($select_testimonial_result as $key=>$testimonial) { ?>
            <tr>
              <th scope="row"><?= $key+1?></th>
             <td>
                <img  width="100" src="../uploads/testimonials/<?= $testimonial['image']?>" alt="">
              </td>
              <td><?=$testimonial['description']?></td>
              <td><?=$testimonial['name']?></td>
              <td><?=$testimonial['designation']?></td>
              <td>
                 <a href="testimonial_edit.php?id=<?= $testimonial['id']?>" class="btn btn-success">Edit</a>
                 <a href='testimonial_delete.php?id=<?= $testimonial['id']?>' class="btn btn-danger">Delete</a>
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

<?php if(isset($_SESSION['delete_testimonial'])) {?>
<script>

Swal.fire({
  icon: 'Success',
  title: 'Your testimonial Deleted',
  text: '<?= $_SESSION['delete_testimonial']?>',
 
})
</script>
<?php } unset($_SESSION['delete_testimonial']) ?>
