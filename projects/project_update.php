<?php 
session_start();
require '../db.php';


$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$image= $_FILES['image'];


    $update_projects = "UPDATE projects SET title='$title', description='$description' ,image='$image' WHERE id=$id";
    $update_projects_result = mysqli_query($db_connect, $update_projects);

    $_SESSION['update_project'] = 'project Updated!';
    header('location:project_edit.php?id='.$id);






?>