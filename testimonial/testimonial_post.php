<?php
session_start();
require '../db.php';

$description = $_POST['description'];
$name = $_POST['name'];
$designation = $_POST['designation'];



$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$exetension = end($after_explode); 
$allowed_extension = array( 'png','jpg', 'jpeg', 'gif');
if(in_array($exetension, $allowed_extension)){
    if($Uploaded_file['size'] <= 1000000){

        $insert_testimonial = "INSERT INTO `testimonials`(`description`,`name`,`designation`) VALUES ('$description','$name','$designation')";
        $insert_testimonial_result = mysqli_query($db_connect, $insert_testimonial);
       
        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$exetension;
        $new_location = '../uploads/testimonials/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE testimonials SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

             
        $_SESSION['success'] = 'Testimonial Added Successfully!';
        header('location:add_testimonial.php');
       
 }
    else{


        $_SESSION['size'] = 'Maximum File Size 1 MB';
        header('location:add_testimonial.php');
    
    }

}
else{
    $_SESSION['invalid_extension'] = 'Image Type Should be (jpg, png, gif, jpeg)';
    header('location:add_testimonial.php');

}

?>