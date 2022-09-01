<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$title = $_POST['tittle'];
$digit= $_POST['digit'];
$icon= $_FILES['icon'];



    $update_facts = "UPDATE facts SET tittle='$title', digit='$digit' ,icon='$icon' WHERE id=$id";
    $update_facts_result = mysqli_query($db_connect, $update_facts);

    $_SESSION['update_fact'] = 'Fact Updated!';
    header('location:fact_edit.php?id='.$id);






?>