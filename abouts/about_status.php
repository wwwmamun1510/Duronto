<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_about = "SELECT * FROM abouts WHERE id=$id";
$select_about_result =  mysqli_query($db_connect, $select_about);
$after_assoc = mysqli_fetch_assoc ($select_about_result);


if($after_assoc['about_status'] == 1){

   $update_about_status = "UPDATE abouts SET about_status=0 WHERE id=$id";
   $update_about_status_result =  mysqli_query($db_connect, $update_about_status);
   header('location:abouts.php');

}
else{

    $count_about_status = "SELECT COUNT(*) as total_active FROM abouts WHERE about_status=1";
    $count_about_status_result =  mysqli_query($db_connect, $count_about_status);
    $after_count_assoc = mysqli_fetch_assoc($count_about_status_result);
    if($after_count_assoc['total_active'] == 1){
    $_SESSION['limit'] ='You Can Activate 1 about'; 
    header('location:abouts.php');

     }
     else{

        $update_about_status = "UPDATE abouts SET about_status=1 WHERE id=$id";
        $update_about_status_result =  mysqli_query($db_connect, $update_about_status);
        header('location:abouts.php');



     }

}

?>