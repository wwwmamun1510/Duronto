<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_educations = "SELECT * FROM educations WHERE id=$id";
$select_educations_result =  mysqli_query($db_connect, $select_educations);
$after_assoc = mysqli_fetch_assoc ($select_educations_result);


if($after_assoc['education_status'] == 1){

   $update_education_status = "UPDATE educations SET education_status=0 WHERE id=$id";
   $update_education_status_result =  mysqli_query($db_connect, $update_education_status);
   header('location:educations.php');

}
else{

    $count_education_status = "SELECT COUNT(*) as total_active FROM educations WHERE education_status=1";
    $count_education_status_result =  mysqli_query($db_connect, $count_education_status);
    $after_count_assoc = mysqli_fetch_assoc($count_education_status_result);
    if($after_count_assoc['total_active'] == 4){
    $_SESSION['limit'] ='You Can Not  Activate More Than 4 educations'; 
    header('location:educations.php');

     }
     else{

        $update_education_status = "UPDATE educations SET education_status=1 WHERE id=$id";
        $update_education_status_result =  mysqli_query($db_connect, $update_education_status);
        header('location:educations.php');



     }

}

?>