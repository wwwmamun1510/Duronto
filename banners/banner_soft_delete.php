<?php
session_start();

require '../db.php';

$id = $_GET['id'];

$update_banners = "UPDATE banners SET status = 1 WHERE id = $id";
$update_banners_result =  mysqli_query($db_connect, $update_banners);


$_SESSION['soft_del_banner'] = "banner Soft Deleted!";
header('location:banners.php');


?>