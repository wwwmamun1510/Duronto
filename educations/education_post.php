<?php

session_start();
require '../db.php';

$education_name= $_POST['education_name'];
$percentage= $_POST['percentage'];
$year= $_POST['year'];


        $insert_education= "INSERT INTO `educations`( `education_name`,`percentage`,`year`) VALUES ('$education_name','$percentage','$year')";
        $insert_education_result = mysqli_query($db_connect, $insert_education);
        $_SESSION['education_added'] = 'education Added!';
        header('location:add_education.php');
       
 ?>    