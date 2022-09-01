<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM brands WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);

$delete_brand= "DELETE FROM  brands WHERE id=$id";
$delete_brand_result = mysqli_query($db_connect, $delete_brand);

$_SESSION['delete_brand'] = "Brand Deleted Successfully!";
header('location:brands.php');



?>