<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM banners WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);


$delete_from = '../uploads/banners/'.$after_assoc['profile_image'];
unlink($delete_from);

$delete_banners= "DELETE FROM  banners WHERE id=$id";
$delete_banners_result = mysqli_query($db_connect, $delete_banners);

$_SESSION['banner_delete'] = "Banner Deleted Successfully!";
header('location:banners.php');



?>