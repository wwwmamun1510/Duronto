<?php 
require '../db.php';

$id = $_GET['id'];

$select_project = "SELECT * FROM projects WHERE id=$id";
$select_project_result =  mysqli_query($db_connect, $select_project);
$after_assoc = mysqli_fetch_assoc ($select_project_result);


if($after_assoc['img_status'] == 1){

   $update_status = "UPDATE projects SET img_status=0 WHERE id=$id";
   $update_status_result =  mysqli_query($db_connect, $update_status);
   header('location:projects.php');

}
else{

    $update_status1 = "UPDATE projects SET img_status=0 ";
    $update_status_result1 =  mysqli_query($db_connect, $update_status1);

    $update_status = "UPDATE projects SET img_status=1 WHERE id=$id";
    $update_status_result =  mysqli_query($db_connect, $update_status);
    header('location:projects.php');
 

}







?>