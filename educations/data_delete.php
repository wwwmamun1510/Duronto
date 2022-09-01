<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM educations WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);


$delete_from = '../uploads/educations/'.$after_assoc['profile_photo'];
unlink($delete_from);

$delete_educations = "DELETE FROM  educations WHERE id=$id";
$delete_educations_result = mysqli_query($db_connect, $delete_educations);

$_SESSION['delete_educations'] = "Education Deleted Successfully!";
header('location:education_trash.php');



?>