<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM purchase WHERE id='$id'");

$data = mysqli_fetch_assoc($query);


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
    
    <?php include("include/acc-menu.php");?>
    <!-- *** MAIN CONTENT ****** -->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Payments</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Payment Information</h4>
              <form class="form-horizontal style-form" name="update_payment" action="update_payment.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ;?>">

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">PO Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="dept_name" value="<?php echo $data['po_number'];?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Party Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="dept_name" value="<?php echo $data['party_name'];?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Net Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="net_amount"value="<?php echo $data['net_amount'];?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pending Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pending_amount"value="<?php echo $data['net_amount']-$data['paid_amount'];?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pay Amount</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pay_amount"value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Payment Method</label>
                  <div class="col-sm-6">
                     <label><b>Payment Method:</b></label>
                    <hr>
                     <div class="radio">
                        <label>
                          <input type="radio" name="payment_method" id="optionsRadios1" value="NEFT" checked> NEFT
                          </label>
                        <label>
                          <input type="radio" name="payment_method" id="optionsRadios2" value="Cheque">Cheque
                          </label>
                          <label>
                          <input type="radio" name="payment_method" id="optionsRadios1" value="Debit/Credit Card">Debit/Credit Card
                          </label>
                          <label>
                          <input type="radio" name="payment_method" id="optionsRadios1" value="Online Wallet">Online Wallet
                          </label>
                          <label>
                          <input type="radio" name="payment_method" id="optionsRadios2" value="Cash">Cash
                          </label>
                          <label>
                          <input type="radio" name="payment_method" id="optionsRadios2" value="Other">Other
                          </label>
                      </div>
                      </label>
                    <hr>
                  </div>
                </div>
                </div>
                
                
                <div class="form-group" align="center">
                  <div class="col-sm-10">
                    <input type="submit" name="update_department" class="btn btn-theme " value="Save">
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