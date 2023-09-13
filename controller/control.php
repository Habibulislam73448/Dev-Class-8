<?php

// start the session
session_start();
include "../database/env.php";

$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$errors = [];

// validation rules

if(empty($title)){
    $errors ['title_error'] = "Title nh diye koi jabi😒";
} elseif (strlen($title) > 10){
    $errors ['title_error'] = "Title lekh, Paragraph nh 🙄";
}

if(empty($detail)){
    $errors ['detail_error'] = "Kiree! Detail dili nh j?😠";
}
if (count($errors)>0){
    // backward
    $_SESSION['old']=$_REQUEST;
    $_SESSION['form_errors']= $errors;
    header("Location: ../index.php");
}
else{
    // forward
    $query = "INSERT INTO posts ( title, detail, author) VALUES ('$title', '$detail', '$author')";
    $result = mysqli_query($conn,$query);
 
    if($result){
        $_SESSION['msg'] = 'Your post has been inserted';
        header("location: ../index.php");
    }
}