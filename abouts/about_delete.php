<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM abouts WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);

$delete_about= "DELETE FROM  abouts WHERE id=$id";
$delete_about_result = mysqli_query($db_connect, $delete_about);

$_SESSION['delete_about'] = "About Deleted Successfully!";
header('location:abouts.php');



?>