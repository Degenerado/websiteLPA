<?php
require("common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LPA Logic Peripherals Australia  | Log in</title>

  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="unit/css/css/all.min.css">
  <!-- icheck bootstrap -->
  <!--link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"-->
  <!-- Theme style -->
  <link rel="stylesheet" href="unit/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="unit/css/toastr.min.css">
  <!-- Estilos adicionales -->
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: radial-gradient(circle at 100%, #333, #333 50%, #eee 75%, #333 75%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        main {
            width: 100%;
            padding: 20px;
            margin: auto;
            margin-top: 100px;
        }

        .contendor__todo {
            width: 100%;
            max-width: 800px;
            margin: auto;
            position: relative;
        }

        .caja__trasera {
            width: 100%;
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            backdrop-filter: blur(10px);
            background-color: rgba(232, 212, 212, 0.2);
            border-radius: 0.5rem;
        }

        /* ... (rest of your styles) */
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">  
    <a href="index.php"><b> LPA  <img src="images/Avatar/Logo.png" class="profile-user-img img-fluid img-circle"></b>Logic Peripherals Australia</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<?php
  if(isset($_REQUEST['login'])){
    session_start();
    $email=$_REQUEST['e-mail']??'';
    $pass=$_REQUEST['pass']??'';
    include_once "dbwebsitelpa.php";
    $con=mysqli_connect($host,$user,$password,$db);
    $query="SELECT id,e-mail,name  id from user where email='".$email."' and pass='".$password."'";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
    if($row){
      $SESSION['id']=$row['id'];
      $SESSION['e-mail']=$row['e-mail'];
      $SESSION['name']=$row['name'];
      // header("location: Index.php");
    }
    else{      
?>
  <div class="alert alert-danger" role="alert" width="200"> 
    Error de login
  </div>


<?php
}
  } 
?>       
      <form action="login_submit.php" method="POST"> <!--login js--> 
        <div class="input-group mb-3">
        <input type="email" class="form-control"  placeholder="Email" autofocus="on" name="e-mail" required = "true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
        <div class="social-auth-links text-center mb-3">
        <button type="submit" href="#" class="btn btn-block btn-primary" name="login">
         Login
        </button>
        <?php if(isset($_GET['error'])) echo $_GET['error']; ?>
      </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="signup.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="unit/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="unit/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="unit/js/adminlte.min.js"></script>
<script src="unit/js/toastr.min.js"></script> <!--libreria para alertas-->
<?php
// ... (your PHP code for handling the login)

?>
<?php include 'footer.php'; ?>
</body>
</html>