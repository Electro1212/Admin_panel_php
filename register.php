<?php
$conn = mysqli_connect("localhost","root","","admin_panel_1");

if(isset($_POST['register'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $conf_password = $_POST['conf_password'];
  $name = $_POST['name'];
  
  if($password!=$conf_password){
    header("Location:register.php?pass=1");
    die;
  }
  if($email==""||$name==""||$password==""||$conf_password==""){
    header("Location:register.php?empty=1");
    die;
  }else{
    $sql = "INSERT INTO `register`(`Email`, `Password`, `Name`, `Conf_Password`,`Phone` ) VALUES ('$email','$password','$name','$conf_password','$phone')";
    mysqli_query($conn,$sql);
    header("Location:index.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo mr-4">
  <img class="animation__shake" src="./dist/img/./AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <a href="" class="h1"><b class="text-danger">ElectroHub</b></a>
  </div>

  <div class="card">
    <?php
    if(isset($_GET['empty'])){
      echo '<div class="alert alert-danger" role="alert" id="alert">
      fields are empty!! <a href="register.php" class="alert-link"> retry! </a>.
    </div>';
    }
    if(isset($_GET['pass'])){
      echo '<div class="alert alert-danger" role="alert" id="alert">
      Passwords are not same!! <a href="register.php" class="alert-link"> retry! </a>.
    </div>';
    }
    ?>
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Phone Number" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="conf_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
