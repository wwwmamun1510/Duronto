<?php
session_start();
require '../db.php';


$title = $_POST['tittle'];
$description = $_POST['description'];




$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$exetension = end($after_explode); 
$allowed_extension = array( 'png','jpg', 'jpeg', 'gif');
if(in_array($exetension, $allowed_extension)){
    if($Uploaded_file['size'] <= 1000000){

        $insert_project = "INSERT INTO `projects`( `title`, `description`) VALUES ('$title','$description')";
        $insert_project_result = mysqli_query($db_connect, $insert_project);
       
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$exetension;
        $new_location = '../uploads/projects/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE projects SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

             
        $_SESSION['success'] = 'project Added Successfully!';
        header('location:add_project.php');
       
 }
    else{


        $_SESSION['size'] = 'Maximum File Size 1 MB';
        header('location:add_project.php');
    
    }

}
else{
    $_SESSION['invalid_extension'] = 'Image Type Should be (jpg, png, gif, jpeg)';
    header('location:add_project.php');

}

?>