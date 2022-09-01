<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_brand = "SELECT * FROM brands WHERE id=$id";
$select_brand_result =  mysqli_query($db_connect, $select_brand);
$after_assoc = mysqli_fetch_assoc ($select_brand_result);


if($after_assoc['brand_status'] == 1){

   $update_brand = "UPDATE brands SET brand_status=0 WHERE id=$id";
   $update_brand_result =  mysqli_query($db_connect, $update_brand);
   header('location:brands.php');

}

else{

   $count_brand_status = "SELECT COUNT(*) as total_active FROM brands WHERE brand_status=1";
   $count_brand_status_result =  mysqli_query($db_connect, $count_brand_status);
   $after_count_assoc = mysqli_fetch_assoc($count_brand_status_result);
   if($after_count_assoc['total_active'] == 1){
   $_SESSION['limit'] ='You Can  Activate  1 brand'; 
   header('location:brands.php');

    }

     else{

        $update_brand_status = "UPDATE brands SET brand_status=1 WHERE id=$id";
        $update_brand_status_result =  mysqli_query($db_connect, $update_brand_status);
        header('location:brands.php');



     }

}

?>