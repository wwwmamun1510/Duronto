<?php
session_start();

require '../db.php';

$id = $_GET['id'];

$update_areas = "UPDATE areas SET status = 1 WHERE id = $id";
$update_areas_result =  mysqli_query($db_connect, $update_areas);


$_SESSION['soft_del_area'] = "Area Soft Deleted!";
header('location:area.php');


?>