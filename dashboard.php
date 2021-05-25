<?php
session_start();
include('connect.php');

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
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
  <link href="img/logo.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

 
</head>

<body>
  <section id="container">
    
    <?php include("include/menu.php");?>
    <!-- *** MAIN CONTENT ****** -->
    <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Dashboard </h3>
        <div class="row mb">
          <!-- page start-->
          <div class="">

              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>Total Parties</h5>
                  </div>
                  <?php
                    $party_query=mysqli_query($conn,"SELECT * FROM party");
                    $party_num_rows=mysqli_num_rows($party_query);

                  ?>
                  
                  
                  <div class="row">
                    <div class="col-md-12">
                      <h1 style="color: #fff;font-size: 100px"><?php echo $party_num_rows;?></h1>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <a href="generate-po.php">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                      <h5>Purchase Orders</h5>
                    </div>
                    <?php
                      $purchase_query=mysqli_query($conn,"SELECT * FROM purchase");
                      $purchase_num_rows=mysqli_num_rows($purchase_query);

                    ?>
                    <div class="row">
                      <div class="col-md-12">
                        <h1 style="color: #fff;font-size: 100px"><?php echo $purchase_num_rows;?></h1>
                      </div>
                    </div>
                  </div>
                </a>  

              </div>
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>Total Products</h5>
                  </div>
                  <?php
                    $product_query=mysqli_query($conn,"SELECT * FROM product");
                    $product_num_rows=mysqli_num_rows($product_query);

                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <h1 style="font-size: 100px;"><?php echo $product_num_rows;?></h1>
                    </div>
                  </div>
                </div>
              </div>
             </div>
            </div>  
    </section>
  </section>
    <!--main content end-->
    <!--footer start-->
   <!--  <footer class="site-footer">
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
    </footer> -->
  </section>
    
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome <?php echo $user; ?>',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
