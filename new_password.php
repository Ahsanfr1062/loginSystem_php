<?php
    $showError = false;
   $login = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/_db.php';
    $fPassword = $_POST["fPassword"];
    $fCPassword = $_POST["fCPassword"];
    // $num = mysqli_num_rows($result);
    $username = $_GET["username"];
    $sql = "Select * from usertabel where username='$username'";
    $resul =  mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($resul)){
        $id = $row["sno"];
        if($fPassword == $fCPassword){
            $sql = "UPDATE `usertabel` SET `password` = '$fPassword' WHERE `usertabel`.`sno` = $id";
            $result =  mysqli_query($conn, $sql);
            header("location : login.php");

    }

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
    if($showError){
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sikes!</strong> '. $showError . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container">
        <h1 class = "text-center text-success">Enter Your Username!</h1>
        <form action = "forget_password.php" method = "post">
  <div class="mb-3">
    <label for="password" class="form-label">New Password</label>
    <input type="text" class="form-control" id="fPassword" name= "fPassword" aria-describedby="emailHelp">
  </div> 
  <div class="mb-3">
    <label for="fCPassword" class="form-label">Confirm Password</label>
    <input type="text" class="form-control" id="fCPassword" name= "fCPassword" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">ADD</button>
</form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>