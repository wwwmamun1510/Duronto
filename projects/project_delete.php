<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM projects WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);

$delete_projects = "DELETE FROM  projects WHERE id=$id";
$delete_projects_result = mysqli_query($db_connect, $delete_projects);

$_SESSION['delete_project'] = "project Deleted Successfully!";
header('location:projects.php');



?>