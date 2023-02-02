<?php
    $showError = false;
   $showAlert = false;
  //  $showUser = false;
  //  $exists = true;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/_db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $sql = "select * from `usertabel` where username = '$username'";
    $result =  mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
      $showError = "Username Already Exists";
    } 
    else{
      if(($password == $cpassword)){
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `usertabel` (`sno`, `username`, `password`, `date`) VALUES (NULL, '$username', '$password', current_timestamp())";
        $result =  mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
        }
      }
      else{
        $showError = "Password Does not match";
      }
    }


    // ------------Another way to check the unique of the username( Bad way)------------
    // while($row = mysqli_fetch_array($result)){
    //   if($username == $row['username']){
    //     global $exists;
    //     $exists = true;
    //     $showUser = "User Already Exists";
    //     break;
    //   }
    //   else{
    //     $exists = false;
    //   }
    // }


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
    if($showAlert){
      echo '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>Your account has been successfuly created!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showError){
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sikes!</strong> '. $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container">
        <h1 class = "text-center text-success">Sign up to our Page</h1>
        <form action = "signup.php" method = "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name= "username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name = "password" >
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name = "cpassword">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>