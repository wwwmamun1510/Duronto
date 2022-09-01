<?php
session_start();
require '../db.php';



$logo= $_FILES['area']['name'];


$uploaded_file = $_FILES['area'];
$after_explode = explode('.', $uploaded_file['name']);
$exetension = end($after_explode); 
$allowed_extension = array( 'png','jpg', 'jpeg', 'gif');
if(in_array($exetension, $allowed_extension)){
    if($Uploaded_file['size'] <= 1000000){

        $insert_area = "INSERT INTO `areas`( `area`) VALUES ('$area')";
        $insert_area_result = mysqli_query($db_connect, $insert_area);
       
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$exetension;
        $new_location = '../uploads/areas/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE areas SET area='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

             
        $_SESSION['success'] = 'Area Added Successfully!';
        header('location:add_area.php');
       
 }
    else{


        $_SESSION['size'] = 'Maximum File Size 1 MB';
        header('location:add_area.php');
    
    }

}
else{
    $_SESSION['invalid_extension'] = 'Image Type Should be (jpg, png, gif, jpeg)';
    header('location:add_area.php');

}

?>