<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_facts = "SELECT * FROM facts WHERE id=$id";
$select_facts_result =  mysqli_query($db_connect, $select_facts);
$after_assoc = mysqli_fetch_assoc ($select_facts_result);


if($after_assoc['fact_status'] == 1){

   $update_fact_status = "UPDATE facts SET fact_status=0 WHERE id=$id";
   $update_fact_status_result =  mysqli_query($db_connect, $update_fact_status);
   header('location:facts.php');

}
else{

    $count_fact_status = "SELECT COUNT(*) as total_active FROM facts WHERE fact_status=1";
    $count_fact_status_result =  mysqli_query($db_connect, $count_fact_status);
    $after_count_assoc = mysqli_fetch_assoc($count_fact_status_result);
    if($after_count_assoc['total_active'] == 4){
    $_SESSION['limit'] ='You Can Not  Activate More Than 4 facts'; 
    header('location:facts.php');

     }
     else{

        $update_fact_status = "UPDATE facts SET fact_status=1 WHERE id=$id";
        $update_fact_status_result =  mysqli_query($db_connect, $update_fact_status);
        header('location:facts.php');



     }

}

?>