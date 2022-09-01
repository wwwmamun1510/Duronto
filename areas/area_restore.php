<?php 

session_start();

require '../db.php';

$id = $_GET['id'];

$update_areas = "UPDATE areas SET status = 0 WHERE id = $id";
$update_areas_result =  mysqli_query($db_connect, $update_areas);

$_SESSION['Area_restore'] = "Area Restored Successfully!";
header('location:area.php');

?>