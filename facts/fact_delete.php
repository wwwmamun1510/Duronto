<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM facts WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc ($select_img_result);

$delete_facts= "DELETE FROM  facts WHERE id=$id";
$delete_facts_result = mysqli_query($db_connect, $delete_facts);

$_SESSION['delete_fact'] = "Fact Deleted Successfully!";
header('location:facts.php');



?>