<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];




    $update_about = "UPDATE abouts SET title='$title', description='$description' WHERE id=$id";
    $update_about_result = mysqli_query($db_connect, $update_about);

    $_SESSION['update_about'] = 'about Updated!';
    header('location:about_edit.php?id='.$id);






?>