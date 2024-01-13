<?php
  session_start();
  if (isset($_SESSION['user_info'])) {
      header("Location:dashboard.php");
  }

  include "includes/database.php";

  $db = new Database();
  if (isset($_POST['submit'])) {
      $email = $db->escapeString($_POST['email']);
      $password = $db->escapeString($_POST['password']);
      
      $pwd = sha1(md5(sha1($password)));

      $db->select("users","*",null,"email_address = '{$email}' AND pwd = '{$pwd}'");
      $result = $db->getResult();
      if (!empty($result)) {
          
        
          $_SESSION['user_info'] = [
                                    "email" => "{$result[0]['email_address']}",
                                    "status" => "{$result[0]['status']}"
                                    ];
          header("Location:dashboard.php");

      }else{
        header("Location:index.php?error");
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b> Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please log in to go to dashboard</p>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">

            <?php 
              if(isset($_GET['error'])){
                echo '<p class="text-center text-danger">Invalid Login Credentials</p>';
              }
            ?>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

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
</body>
</html>