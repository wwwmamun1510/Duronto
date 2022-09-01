<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';
require '../db.php';

$select_trash_educations = "SELECT * FROM educations WHERE status=1";
$select_trash_educations_result = mysqli_query($db_connect, $select_trash_educations);
?>


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item custom" href="index.html">Trash</a>
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
                         <th scope="col">TITLE</th>
                         <th scope="col">DESCRIPTION</th>
                         <th scope="col">IMAGE</th>
                         <th scope="col">BUTTON NAME</th>
                         <th scope="col">ACTION</th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach($select_trash_educations_result as $key=>$trash_educations){?>
                         <tr>
                         <th scope="row"><?= $key+1?></th>
                         <td><?= $trash_educations['title']?></td>
                         <td><?= $trash_educations['description']?></td>
                         <td> <img width="150" src="../uploads/educations/<?= $trash_educations['image']?>" alt=""></td>
                         <td><?= $trash_educations['btn']?></td>
                          <td>
                          <a href="education_restore.php?id=<?= $trash_educations['id']?>" class="btn btn-secondary">Restore</a>
                          <a  href="education_delete.php?id=<?=$trash_educations['id']?>"   class="btn btn-danger deleteBtn">Delete</a>
                          </td>
                          </tr>
                                  
                          <?php } ?>
                          </tbody>
                     </table>
                 </div>
             </div>
         </div>
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
    })
</script> 