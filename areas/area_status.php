<?php 
require '../db.php';

$id = $_GET['id'];

$select_area = "SELECT * FROM areas WHERE id=$id";
$select_area_result =  mysqli_query($db_connect, $select_area);
$after_assoc = mysqli_fetch_assoc ($select_area_result);


if($after_assoc['area_status'] == 1){

   $update_status = "UPDATE areas SET area_status=0 WHERE id=$id";
   $update_status_result =  mysqli_query($db_connect, $update_status);
   header('location:area.php');

}
else{

    $update_status1 = "UPDATE areas SET area_status=0 ";
    $update_status_result1 =  mysqli_query($db_connect, $update_status1);

    $update_status = "UPDATE areas SET area_status=1 WHERE id=$id";
    $update_status_result =  mysqli_query($db_connect, $update_status);
    header('location:area.php');
 

}







?>