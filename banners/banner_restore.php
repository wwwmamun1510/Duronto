<?php 

session_start();

require '../db.php';

$id = $_GET['id'];

$update_banners = "UPDATE banners SET status = 0 WHERE id = $id";
$update_banners_result =  mysqli_query($db_connect, $update_banners);

$_SESSION['banner_restore'] = "banner Restored Successfully!";
header('location:banners.php');

?>