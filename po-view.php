<?php
  
session_start();
include('connect.php');
error_reporting(0);
$id=$_GET['id'];


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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">


 
</head>
<style type="text/css">
  @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
<script type="text/javascript">
 


     window.print();

     



  
</script>


<body>
  <section id="container">
    <!--Main Content-->
     <section id="main-content">
      
        <section class="wrapper" id="section-to-print">
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="col-lg-10 col-lg-offset-1">
                <div class="invoice-body">
                  <div class="pull-left">
                    <center><h1>R.D. & S.H. National College & S.W.A. Science College</h1></center>
                    <address>
                      <h4>From</h4>
                  <strong>R.D. National College</strong><br>
                  Linking Rd, Bandra, Bandra West,<br>
                   Mumbai, Maharashtra 400050<br>
                  
                </address>
                  </div>
                  <!-- /pull-left -->
                  <div class="pull-right">
                    <h2>Purchase Order</h2>
                  </div>
                  <!-- /pull-right -->
                  <div class="clearfix"></div>
                  <br>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-9">
                      <?php 
                        $pq=mysqli_query($conn,"SELECT * FROM purchase WHERE id=$id")or die();
                        $pqrow=mysqli_fetch_array($pq);
                      ?>
                      <h4>To</h4>
                      <address>
                    <strong><?php echo $pqrow['party_name'];?></strong><br>
                    <?php echo $pqrow['address'];?><br>
                    
                    
                  </address>
                    </div>
                    <!-- /col-md-9 -->
                    <div class="col-md-3">
                      <br>
                      <div>
                        <div class="pull-left"> PO NO : </div>
                        <div class="pull-right"><?php echo "RDNC00".$id;?></div>
                        <div class="clearfix"></div>
                      </div>
                      <div>
                        <?php 
                          $query=mysqli_query($conn,"SELECT * FROM purchase_order WHERE po_no=$id");
                          $row=mysqli_fetch_array($query);

                        ?>
                        <!-- /col-md-3 -->
                        <div class="pull-left"> PO DATE : </div>
                        <div class="pull-right"><?php echo $row['po_date'];?></div>
                        <div class="clearfix"></div>
                      </div>
                      <!-- /row -->
                      <br>
                      
                    </div>
                    <!-- /invoice-body -->
                  </div>
                  <!-- /col-lg-10 -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:60px" class="text-center">#</th>
                        <th class="text-left">Items</th>
                        <th style="width:60px" class="text-center">QTY</th>
                        <th style="width:60px" class="text-right">UNIT PRICE</th>
                        <th style="width:60px" class="text-center">Amount</th>
                        <th style="width:60px" class="text-center">SGST</th>
                        <th style="width:60px" class="text-center">CGST</th>
                        <th style="width:140px" class="text-right">DISCOUNT</th>
                        <th style="width:90px" class="text-right">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count=0;
                        $dquery=mysqli_query($conn,"SELECT * FROM purchase_order WHERE po_no=$id")or die();
                        while ($row=mysqli_fetch_array($dquery)) {
                        $count++;

                      ?>
                      <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $row['items'];?></td>
                        <td class="text-center"><?php echo $row['qty'];?></td>
                        <td class="text-right"><?php echo $row['mrp'];?></td>
                        <td class="text-right"><?php echo $row['amount'];?></td>
                        <td class="text-right"><?php echo $row['gst_amount']/2;?></td>
                        <td class="text-right"><?php echo $row['gst_amount']/2;?></td>
                        <td class="text-right"><?php echo $row['total_discount'];?></td>
                        <td class="text-right"><?php echo $row['net_amount'];?></td>
                      </tr>
                      <?php 
                        }
                      ?>
                      <?php 
                        
                          $tq=mysqli_query($conn,"SELECT SUM(total_discount),SUM(amount),SUM(gst_amount),SUM(net_amount) FROM purchase_order WHERE po_no=$id") or die(mysqli_error($conn));
                          $tqrow=mysqli_fetch_array($tq);
                          $tot_amt=number_format($tqrow['SUM(amount)'],2);
                          $tot_gst=number_format($tqrow['SUM(gst_amount)'],2);
                          $tot_disc=number_format($tqrow['SUM(total_discount)'],2);
                          $net_amt=number_format($tqrow['SUM(net_amount)'],2);
                        
                      
                    
                      ?>
                      
                      <tr>
                        <td colspan="7" rowspan="4">
                          <h4>Sir/Madam,</h4>
                          <p>Your quotation has been accepted for the following item by the purchase committee, for the college use. Kindly supply the following as per quantities indicated as under :</p>
                          <td class="text-right"><strong>Subtotal</strong></td>
                          <td class="text-right"><?php echo $tot_amt;?></td>
                      </tr>
                      <tr>
                        <td class="text-right no-border"><strong>SGST+CGST</strong></td>
                        <td class="text-right"><?php echo $tot_gst;?></td>
                      </tr>
                      <tr>
                        <td class="text-right no-border"><strong>Total Discount</strong></td>
                        <td class="text-right"><?php echo $tot_disc;?></td>
                      </tr>
                      <tr>
                        <td class="text-right no-border">
                          <div class="well well-small green"><strong>Total</strong></div>
                        </td>
                        <td class="text-right"><strong><?php echo $net_amt;?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <br>
                  
                  <div class="col-lg-12" align="center">
                    <center>
                    <table class="table" align="center" style="margin-top: 200px;">
                      <tr>
                        <td class="text-center no-border pull-left" rowspan="3" style="width: 500px;">
                          <div class="col-md-6 pull-left">
                            
                            Principal
                          </div>
                        </td>
                        <td class="text-center no-border" rowspan="3" style="width: 200px;">
                          
                        </td>
                        <td class="text-center no-border pull-right" rowspan="3" style="width: 500px;"> 
                          <div class="col-md-6 pull-right">
                            
                            Purchase Committee
                          </div>
                        </td>
                      </tr>
                      
                    </table>
                    </center>
                  </div>
                 
                </div>
                <!--/col-lg-12 mt -->
        </section>
         
      <!-- /wrapper -->
    </section>
    <!--main content end-->
      <!--footer start-->
      <footer class="site-footer navbar-fixed-bottom">
        <div class="text-center">
          <p>

           <a href="generate-po.php"><button name="next" class="btn btn-theme02 ">Done</button></a>
          </p>
          <div class="credits">
            
          </div>
          <a href="po-view.php#" class="go-top">
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
  <script type="text/javascript">  