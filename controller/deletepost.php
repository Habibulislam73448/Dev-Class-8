<?php
session_start();
include_once "../database/env.php";
$id = $_REQUEST['id'];
$query = "DELETE FROM posts WHERE id = '$id' ";
$res = mysqli_query($conn, $query);

if ($res) {
    $_SESSION['msg'] = "You data has been deleted";
    header("location:../allPosts.php");
}