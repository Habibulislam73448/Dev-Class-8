<?php
// session start
session_start();
include "./database/env.php";
$query = " SELECT * FROM posts ";
$response = mysqli_query($conn,$query);
$posts= mysqli_fetch_all($response, 1);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Class 7</title>
    <link rel="stylesheet" href="Css/style.css">
   
    </head>
    <body>
    <nav class="navbar navbar-expand-lg" style="padding: 30px 0px 50px 0;">
  <div class="container">
    <a class="navbar-brand" href="index.php"style=" color: #00FFFF">Post SYS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"style=" color: #00FFFF">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="allposts.php"style=" color: #00FFFF">All Posts</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <!-- table start here-->
    <div class="col-lg-6 mx-auto mt-5">
    <table class="table">
    <tr>
        <td>#</td>    
        <td>Title</td>
        <td>Detail</td>
        <td>Author</td>
    </tr>
    <?php
    foreach($posts as $key=>$post){
    ?>
    <tr class="text-center">
        <td><?= ++$key ?> </td>    
        <td><?=$post['title'] ?></td>
        <td><?= strlen($post['detail']) > 50 ?  substr($post['detail'], 0, 50) . '....' : $post['detail'] ?></td>
        <td>
          <img style="width: 40px; height: 40ox" src="https://api.dicebear.com/7.x/lorelei/svg?seed= <?= $post['author'] ?>">
          <p>
          <?= $post['author'] ?>
          </p>
        </td>
        <td>
            <div class="btn-group">
                <a href="./showpost.php?id=<?= $post['id']?>" class="btn btn-sm btn-warning">Show</a>
                <a href="./editPost.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="./controller/deletePost.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                
                </div>
        </td>
    </tr>
    <?php
    }
    ?>
    
</table>
    </div>
    <!--table End here-->
  
    <!-- toast start here-->
    <div class="toast <?= isset($_SESSION['msg']) ? "show" : "" ?>" style="position: absolute; bottom: 20 px; right: 50px" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">Post System</strong>
    <small>1 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  <?= isset($_SESSION['msg']) ? $_SESSION['msg'] : ""?>
  </div>
</div>
    <!-- toast end here-->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    

    </body>
</html>
<?php
session_unset();
?>