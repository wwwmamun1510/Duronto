
<?php
require '../dashboard_includes/header.php';
require '../session_check.php';
?>
<?php

require '../db.php';
$id = $_GET['id'];

$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result );

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
             <h3>Edit User Information<h3>
              </div>
               <?php if(isset($_SESSION['update_user'])){?>
                <div class="alert alert-success mt-2">
                <?=$_SESSION['update_user'];?>
                </div>
                <?php } unset($_SESSION['update_user'])?>
                <div class="card-body">
                <form  action="update.php" method="POST" enctype="multipart/form-data">
                 <div class="mb-3">
                    <input  type="hidden" name="id" value="<?=$after_assoc['id']?>">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="<?=$after_assoc['name']?>" type="text" name="name" class="form-control">
                    <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Email</label>
                     <input value="<?=$after_assoc['email']?>" type="email" name="email" class="form-control">
                    </div>
                     <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Password</label>
                     <input type="password" name="password" class="form-control">
                     </div>
                     <div class="mb-3">
                      <img width="150"  src="../uploads/users/<?=$after_assoc['profile_photo']?>" alt="">
                     </div>
                     <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Profile Photo</label>
                     <input  type="file" name="profile_photo" class="form-control">
                     </div>
                     <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Country</label>
                      <select name="country" class="form-control">
                            <option value="">--Select Your Country--</option>
                            <option value="Bangladesh" <?=($after_assoc['country'] =='Bangladesh' ? 'selected': '')?>>Bangladesh</option>
                            <option value="India" <?=($after_assoc['country'] =='India' ? 'selected': '')?>>India</option>
                            <option value="Pakistan" <?=($after_assoc['country'] =='Pakistan' ? 'selected': '')?>>Pakistan</option>
                            <option value="USA" <?=($after_assoc['country'] =='USA' ? 'selected': '')?>>USA</option>
                            <option value="China" <?=($after_assoc['country'] =='China' ? 'selected': '')?>>China</option>
                            <option value="Russia" <?=($after_assoc['country'] =='Russia' ? 'selected': '')?>>Russia</option>
                            <option value="France" <?=($after_assoc['country'] =='France' ? 'selected': '')?>>France</option>
                            <option value="UK" <?=($after_assoc['country'] =='UK' ? 'selected': '')?>>UK</option>
                            <option value="Isarel" <?=($after_assoc['country'] =='Isarel' ? 'selected': '')?>>Isarel</option>
                            <option value="Japan" <?=($after_assoc['country'] =='Japan' ? 'selected': '')?>>Japan</option>
                    </select> 
                    </div>
                     <?php if(isset($_SESSION['extension'])){ ?>
                     <div class="alert alert-warning mt-2">
                     <?=$_SESSION['extension'];?>
                     </div>
                     <?php } unset($_SESSION['extension']) ?>

                     <?php if(isset($_SESSION['file_size'])){ ?>
                     <div class="alert alert-warning mt-2">
                      <?=$_SESSION['file_size'];?>
                     </div>
                     <?php } unset($_SESSION['file_size']) ?>
                     <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </div>
        </div>
     </div>
  </div>
</div>
</div>
<?php

 require '../dashboard_includes/footer.php';

?>