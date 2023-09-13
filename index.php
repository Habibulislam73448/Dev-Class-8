<?php
// session start
session_start();


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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php" style=" color: #00FFFF">Post SYS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style=" color: #00FFFF">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="allposts.php" style=" color: #00FFFF">All Posts</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <!-- form start here-->
 <div class="card col-lg-4 mx-auto my-4">
  
    <div class="card-header">
        Add post 
    </div>

    <div class="card-body">
        <form action="./controller/control.php" method="POST">
            <input name="title"
             class="form-control my-3" type="text" placeholder="Enter your post Title">
            
            <!-- title validation msg-->
            <?php
            if(isset($_SESSION['form_errors']['title_error'])){
            ?>
                <span class="text-danger"> <?php echo $_SESSION['form_errors']['title_error'] ?></span>
            <?php
            }
            ?>

             <!-- detail validation msg-->
            <textarea class="form-control my-3" name="detail" id="" placeholder="Enter your Details"></textarea>
            <?php
            if(isset($_SESSION['form_errors']['detail_error'])){
            ?>
                <span class="text-danger"> <?php echo $_SESSION['form_errors']['detail_error'] ?></span>
            <?php
            }
            ?>

            
            <input name="author" class="form-control my-3" type="text" placeholder="Enter your Name">
            <button type="submit" class="btn btn-primary">Submit Your Post</button>
        </form> 
    </div>    

</div>
    <!-- form End here-->
  
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