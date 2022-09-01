<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
require '../db.php';

$select_trash_users = "SELECT * FROM users WHERE status=1";
$select_trash_users_result = mysqli_query($db_connect, $select_trash_users);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
   <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item custom" href="index.html">Dashboard</a>
        </nav>
          <div class="sl-pagebody">
            <div class="card mt-5">
               <div class="card-header bg-primary text-center">
                  <h3 class="text-white">Trash</h3>
                    </div>
                     <div class="card-body">
                         <table class="table table-striped">
                         <thead>
                         <tr>
                         <th scope="col">SL</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">photo</th>
                         <th scope="col">Created_At</th>
                         <th scope="col">Action</th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach($select_trash_users_result as $key=>$trash_user){?>
                         <tr>
                         <th scope="row"><?= $key+1?></th>
                         <td><?= $trash_user['name']?></td>
                         <td><?= $trash_user['email']?></td>
                         <td> <img width="150" src="../uploads/users/<?= $trash_user['profile_photo']?>" alt=""></td>
                         <td><?= $trash_user['created_at']?></td>
                         <td>
                         <a href="restore.php?id=<?= $trash_user['id']?>" class="btn btn-secondary">Restore</a>
                         <a  href="delete.php?id=<?=$trash_user['id']?>"   class="btn btn-info  deleteBtn">Delete</a>
                         </td>
                         </tr>
                         <?php } ?>
                       </tbody>
                   </table>
               </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require '../dashboard_includes/footer.php'; ?>
<script>
    const deletebtns = document.querySelectorAll(".deleteBtn");

    // console.log(deletebtns);

    deletebtns.forEach(function (btn) {

        const href = btn.getAttribute('href');

        btn.addEventListener('click', function (event) {
            event.preventDefault();
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
                    window.location.href = href;
                }
            })
        })
    });
</script> 
<?php if(isset($_SESSION['delete_user'])){?> 
 <script>
  Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
</script>
<?php } unset($_SESSION['delete_user']) ?>


<!-- $_SESSION['delete_user'] -->