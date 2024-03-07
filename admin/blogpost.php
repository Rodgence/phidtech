<?php
include("../database/dbconnection.php");

if(isset($_POST['submit'])){
    $file_quote = $_FILES['image'];

    // File upload handling
    $fileName = $file_quote['name'];
    $fileTmp = $file_quote['tmp_name'];
    $fileSize = $file_quote['size'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'png', 'jpeg');

    if(!in_array($fileExt, $allowedExtensions)){
        die("Error: This file extension is not allowed.");
    }

    if($fileSize < 1000000){
        die("Error: This file is too large.");
    }

    // Move the file to upload directory
    $fileNameNew = uniqid('phidtech', true).'.'.$fileExt;
    $fileDestination = 'uploads/'.$fileNameNew;

    if(!move_uploaded_file($fileTmp, $fileDestination)){
        die("Error: There was a problem while uploading the file.");
    }

    // Data insertion into database
    $blogtitle = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql_quote = "INSERT INTO blogposts (image_path, title, message)
                  VALUES ('$fileDestination', '$blogtitle', '$message')";

    if(mysqli_query($conn, $sql_quote)){
        header("Location: home.php?quote=updated");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
