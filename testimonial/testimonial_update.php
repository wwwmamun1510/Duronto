<?php 
session_start();
require '../db.php';

$id = $_POST['id'];
$description = $_POST['description'];
$name = $_POST['name'];
$designation = $_POST['designation'];




    $update_testimonial = "UPDATE testimonials SET  description='$description', name='$name', designation ='$designation' WHERE id=$id";
    $update_testimonial_result = mysqli_query($db_connect, $update_testimonial);

    $_SESSION['update_testimonial'] = 'testimonial Updated!';
    header('location:testimonial_edit.php?id='.$id);






?>