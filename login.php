<?php
    $showError = false;
   $login = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/_db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from usertabel where username='$username' AND password='$password'";
    $result =  mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php?username=".$username);

    }
    else{
      $showError = "Invalid username or password";
    }

  }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'partials/_nav.php';
    if($login){
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>Your have been logged in!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showError){
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Success!</strong> '. $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container">
        <h1 class = "text-center text-success">Login up to our Page</h1>
        <form action = "login.php" method = "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name= "username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name = "password" >
  </div>
  <div class="mb-3">
    <a href="forget_password.php">Forgot Password?</a>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>