<?php

session_start();
require '../db.php';

$title= $_POST['title'];
$description= $_POST['description'];


 $insert_about= "INSERT INTO `abouts`( `title`,`description`) VALUES ('$title','$description')";
 $insert_about_result = mysqli_query($db_connect,$insert_about);
 $_SESSION['about_added'] = 'about Added!';
 header('location:add_about.php');
       
 ?>    