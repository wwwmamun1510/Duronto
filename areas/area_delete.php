<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM areas WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);


$delete_from = '../uploads/areas/'.$after_assoc['area'];
unlink($delete_from);

$delete_area = "DELETE FROM  areas WHERE id=$id";
$delete_area_result = mysqli_query($db_connect, $delete_area);

$_SESSION['delete_area'] = "Area Deleted Successfully!";
header('location:area.php');



?>