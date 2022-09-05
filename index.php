<?php
if (isset($_SESSION['id'])) {
  header("Location:dashboard.php");
  die;
}
$conn = mysqli_connect("localhost", "root", "", "admin_panel_1");
session_start();


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `register` WHERE `Email`='$email' AND `Password`='$password'";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);
  if ($count > 0) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['id'] = $row['Id'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['dp'] = $row['Dp'];
    header("Location:dashboard.php");
    die;
  } else {
    header("Location:index.php?incorrect=1");
    die;
  }
  
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo mr-4">
      <img class="animation__shake" src="./dist/img/./AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      <a href="" class="h1"><b class="text-danger">ElectroHub</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?php
        if (isset($_GET['incorrect'])) {
          echo '<div class="alert alert-danger" role="alert" id="alert">
          Your email and password is wrong <a href="index.php" class="alert-link">retry! </a>.
        </div>';
        }
        ?>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
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

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="button" name="login" >Sign In</button>
          </div>
          <!-- /.col -->
      </div>
      </form>

      <div class="align-center d-flex justify-content-center">
        <p class="mb-1">
          <a href="forgot-password.php">I forgot my password</a>
        </p>
      </div>
      <div class="align-center d-flex justify-content-center">
        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
</body>

</html>