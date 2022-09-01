<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_testimonials = "SELECT * FROM testimonials WHERE id=$id";
$select_testimonials_result =  mysqli_query($db_connect, $select_testimonials);
$after_assoc = mysqli_fetch_assoc ($select_testimonials_result);


if($after_assoc['testimonial_status'] == 1){

   $update_testimonial_status = "UPDATE testimonials SET testimonial_status=0 WHERE id=$id";
   $update_testimonial_status_result =  mysqli_query($db_connect, $update_testimonial_status);
   header('location:testimonials.php');

}
else{

    $count_testimonial_status = "SELECT COUNT(*) as total_active FROM testimonials WHERE testimonial_status=1";
    $count_testimonial_status_result =  mysqli_query($db_connect, $count_testimonial_status);
    $after_count_assoc = mysqli_fetch_assoc($count_testimonial_status_result);
    if($after_count_assoc['total_active'] == 4){
    $_SESSION['limit'] ='You Can Not  Activate More Than 4 testimonials'; 
    header('location:testimonials.php');

     }
     else{

        $update_testimonial_status = "UPDATE testimonials SET testimonial_status=1 WHERE id=$id";
        $update_testimonial_status_result =  mysqli_query($db_connect, $update_testimonial_status);
        header('location:testimonials.php');



     }

}

?>