<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM testimonials WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);

$delete_testimonial= "DELETE FROM  testimonials WHERE id=$id";
$delete_testimonial_result = mysqli_query($db_connect, $delete_testimonial);

$_SESSION['delete_testimonial'] = "Testimonial Deleted Successfully!";
header('location:testimonials.php');



?>