<?php

session_start();
require '../db.php';


$icon= $_POST['icon'];
$digit= $_POST['digit'];
$title= $_POST['title'];

 $insert_fact= "INSERT INTO `facts`( `icon`,`digit`,`title`) VALUES ('$icon','$digit','$title')";
 $insert_fact_result = mysqli_query($db_connect,$insert_fact);
 $_SESSION['fact_added'] = 'Fact Added!';
 header('location:add_fact.php');
       
 ?>    