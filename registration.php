<?php
include('connect.php');
error_reporting(0);


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
  <link href="img/logo.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

 
</head>

<body>
  <section id="container">
    
    
    <!-- *** MAIN CONTENT ****** -->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>CHANGE PASSWORD</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">

            <div class="form-panel">
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>First Name:</b></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>Last Name:</b></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>Email:</b></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>New Password:</b></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12 text-center">
                    <button class="btn btn-theme">Set New Password</button>
                  </div>
                </div>  
               <div class="form-group">
                  <label class="control-label col-md-3">Profile Picture</label>
                  <div class="col-md-4">
                    <input type="file" class="default" name="dp" />
                    <?php 
                      $folder="profile/";
                      echo $_FILES["dp"];
                      echo $folder;
                      print_r($_FILES['dp']);

                    ?>
                  </div>
                  
                </div>
              </form>
            </div>      
          </div>     
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
       
         
        
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights  All Rights Reserved
        </p>
        <div class="credits">
          
        </div>
        <a href="advanced_table.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
  </section>
    
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>
</body>

</html>
