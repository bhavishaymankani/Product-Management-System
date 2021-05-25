 <?php
session_start();
include('connect.php');

if(isset($_POST['submit'])) {
 	$user_name=$_POST['uname'];
 	$password=$_POST['pword'];
 	$query=mysqli_query($conn,"select * from user where username='$user_name'and password='$password'") or die("unable to connect".mysqli_error());
 	$row=mysqli_fetch_array($query);
 	if ($row['username']==$user_name && $row['password']==$password) {
    if ($row['user_type']=="accountant") {
      $_SESSION['username']=$user_name;
      header('location:account-dashboard.php');
    } else {
 		$_SESSION['username']=$user_name;
 		header('location:dashboard.php');
    }
 	} else {
 		$open_dashboard="wromg username or password";
 		echo $open_dashboard;
 	}
 }
  
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>RDNC Service Portal - Purchase</title>

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.png" rel="touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body style="background: #192b38">
  <!--MAIN CONTENT-->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="POST">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="User ID" name="uname" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="pword">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          <input class="btn btn-theme btn-block" href="<?php $open_dashboard;?>" type="submit" name="submit" value="SIGN IN">
          <!-- <hr> -->
          
          <!-- <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div> -->
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
             
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <!-- <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script> -->
</body>

</html>
