<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$education_name = $_POST['education_name'];
$percentage = $_POST['percentage'];
$year= $_POST['year'];



    $update_educations = "UPDATE educations SET education_name='$education_name', percentage='$percentage' year='$year' WHERE id=$id";
    $update_educations_result = mysqli_query($db_connect, $update_educations);

    $_SESSION['update_education'] = 'education Updated!';
    header('location:education_edit.php?id='.$id);






?>