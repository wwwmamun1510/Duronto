<?php
session_start();
require '../session_check.php';
require '../dashboard_includes/header.php';
require '../db.php';

$select_trash_banners = "SELECT * FROM banners WHERE status=1";
$select_trash_banners_result = mysqli_query($db_connect, $select_trash_banners);
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
                         <?php foreach($select_trash_banners_result as $key=>$trash_banners){?>
                         <tr>
                         <th scope="row"><?= $key+1?></th>
                         <td><?= $trash_banners['title']?></td>
                         <td><?= $trash_banners['description']?></td>
                         <td> <img width="150" src="../uploads/banners/<?= $trash_banners['image']?>" alt=""></td>
                         <td><?= $trash_banners['btn']?></td>
                          <td>
                          <a href="banner_restore.php?id=<?= $trash_banners['id']?>" class="btn btn-secondary">Restore</a>
                          <a  href="banner_delete.php?id=<?=$trash_banners['id']?>"   class="btn btn-danger deleteBtn">Delete</a>
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