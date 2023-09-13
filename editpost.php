<?php
session_start();
include_once "./database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * from posts WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="./index.php">Post SYS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./allPosts.php">All Posts</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>



    <!-- form start here -->
    <div class="card col-lg-4 mx-auto mt-4">

        <div class="card-header">
            Edit Post
        </div>

        <div class="card-body">
            <form action="./controller/updatepost.php" method="POST">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <input name="title" value="<?= $post['title'] ?>" class="form-control my-3" type="text" placeholder="Enter your post title">

                <?php
                if (isset($_SESSION['form_errors']['title_error'])) {
                ?>
                    <span class="text-danger"> <?= $_SESSION['form_errors']['title_error']  ?></span>
                <?php
                }

                ?>



                <textarea name="detail" class="form-control my-3" placeholder="Enter Your Detail"><?= $post['detail'] ?></textarea>

                <?php
                if (isset($_SESSION['form_errors']['detail_error'])) {
                ?>
                    <span class="text-danger"><?= $_SESSION['form_errors']['detail_error']  ?></span>
                <?php

                }

                ?>



                <input value="<?= $post['author'] ?>" name="author" class="form-control my-3" type="text" placeholder="Enter your Name">
                <button class="btn btn-primary">Update Your Post</button>
            </form>
        </div>
    </div>
    <!-- form end here -->

    <div class="toast <?= isset($_SESSION['msg']) ? "show" : "" ?>" style="position: absolute; bottom: 50px; right: 50px" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">

            <strong class="me-auto">Post SYS</strong>
            <small>1 sec ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= isset($_SESSION['msg']) ? $_SESSION['msg'] : "" ?>
        </div>
    </div>
</body>

</html>



<?php

session_unset();
?>