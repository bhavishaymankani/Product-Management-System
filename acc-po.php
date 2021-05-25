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
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><img src="img/logo.png"style="width: 40px; height: 35px; " ></a>
      <!--logo end-->
     
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    
    <?php include("include/acc-menu.php")?>
    <!--MAIN CONTENT -->



    
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> View All PO </h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <div class="col-md-12">
                <div class="form-group">
                  <form method="POST" action="">
                      <label class="control-label col-md-3"></label>
                      <div class="col-md-4">
                        <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                          <input type="date" class="form-control" name="from" value="<?php echo $from; ?>">
                          <span class="input-group-addon">To</span>
                          <input type="date" class="form-control" name="to" value="<?php echo $to; ?>">
                        </div>
                        <span class="help-block">Select date range</span>
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-theme02" name="range">Select Range</button>
                      </div>
                  </form>    
                </div>
              </div>
              <div class="col-md-12">
                <div class="pull-right">
                   <label class="control-label col-md-3 ">Payment Status:</label>
                   <div class="col-md-3">
                     <button class="btn btn-success btn-xs"><i class="fa fa-check "></i></button>
                     <span class="help-block">Paid</span>
                   </div>
                   <div class="col-md-3">
                     <button class="btn btn-danger btn-xs"><i class="fa fa-minus "></i></button>
                     <span class="help-block">Pending</span>
                   </div>
                </div> 
              </div>
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>PO Number</th>
                    <th class="hidden-phone">Party</th>
                    <th class="hidden-phone">Department</th>
                    <th class="hidden-phone">Staff</th>
                    <th class="hidden-phone">Gross Amount</th>
                    <th class="hidden-phone">GST (SGST+CGST)</th>
                    <th class="hidden-phone">Discount</th>
                    <th class="hidden-phone">Net Amount</th>
                    <th class="hidden-phone">Pending Amount</th>
                    <th class="hidden-phone">Paid Amount</th>
                    <th class="hidden-phone">Payment Method</th>
                    <th class="hidden-phone">Payment</th>
                    <!-- <th class="hidden-phone">Edit</th>
                    <th class="hidden-phone">Delete</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $status = "fa-minus-circle";
                    $status_color;
                    $count=0;
                    $sql="SELECT * FROM purchase";
                    if (isset($_POST['range'])) {

                      $from=$_POST['from'];
                      $to=$_POST['to'];
                      $sql="SELECT * FROM purchase WHERE date BETWEEN '$from' and '$to' ORDER BY date";
                    }
                    $query=mysqli_query($conn,$sql);
                    while ($rows=mysqli_fetch_array($query)) {
                     $count++;
                     $pend_amt=$rows['net_amount']-$rows['paid_amount'];
                     if ($pend_amt <= 0) {
                       $status ="fa fa-check";
                       $status_color="btn btn-success btn-xs";
                     } else {
                      $status = "fa fa-minus";
                      $status_color="btn btn-danger btn-xs";
                     }
                    
                  ?>
                  <tr class="gradeA">
                    <td><?php echo $count;?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['po_number'];?></td>
                    <td class="hidden-phone"><?php echo $rows['party_name'];?></td>
                    <td class="center hidden-phone"><?php echo $rows['department'];?></td>
                    <td class="center hidden-phone"><?php echo $rows['staff'];?></td>
                    <td class="center hidden-phone"><?php echo $rows['gross_amount'];?></td>
                    <td class="hidden-phone"><?php echo $rows['tax'];?></td>
                    <td class="hidden-phone"><?php echo $rows['discount'];?></td>
                    <td class="hidden-phone"><?php echo $rows['net_amount'];?></td>
                    <td class="hidden-phone"><?php echo $rows['net_amount']-$rows['paid_amount'];?></td>
                    <td class="hidden-phone"><?php echo $rows['paid_amount'];?></td>
                    <td class="hidden-phone"><?php echo $rows['payment_method'];?></td>
                    <td><a href="po-payment.php?id=<?php echo $rows['id'];?>"><button class="<?php echo $status_color;?>"><i class="<?php echo $status;?>"></i></button></a></td>
                    <!-- <td><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                    <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td> -->
                  </tr>
                <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights  All Rights Reserved
        </p>
        <div class="credits">
          
        </div>
        <a href="acc-po.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] ;
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
