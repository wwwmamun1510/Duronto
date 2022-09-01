<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM banners WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);


$delete_from = '../uploads/banners/'.$after_assoc['profile_photo'];
unlink($delete_from);

$delete_banners = "DELETE FROM  banners WHERE id=$id";
$delete_banners_result = mysqli_query($db_connect, $delete_banners);

$_SESSION['delete_banners'] = "banner Deleted Successfully!";
header('location:banner_trash.php');



?>