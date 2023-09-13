<?php
session_start();
include "../database/env.php";
$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$errors = [];

if(empty($title)) {
    $errors['title_error'] = "Please enter you title";
}
else if(strlen($title) > 10) {
    $errors['title_error']= 'Title must be less than or equal to ten characters';
}

if (empty($detail)) {
    $errors['detail_error'] = "Please enter you detail";
}

if(count($errors) > 0) {
    //*back
    $_SESSION['form_errors'] = $errors;
    header("Location: ../editPost.php?id=$id");
}
else{
    $query = "UPDATE posts SET title='$title',detail='$detail',author='$author' WHERE id='$id'";
    $response = mysqli_query($conn, $query);
    $_SESSION['msg'] = "Your post has been updated";
    header("Location: ../allPosts.php");
    
    
}