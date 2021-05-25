<?php
session_start();
include('connect.php');
error_reporting(0);
session_start();


$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}

$id=$_GET['id'];

$query=mysqli_query($conn,"SELECT * FROM purchase WHERE id=$id") or die(mysqli_error());
$row=mysqli_fetch_array($query);

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
    
     <?php include("include/menu.php");?>
    <!-- *** MAIN CONTENT ****** -->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Purchase Order</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">


            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> PO Details</h4>
              <form class="form-horizontal style-form" method="post">

                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>PO No.</b></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="po_no" value="<?php echo $row['po_number'] ?>" disabled>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>Date</b></label>
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <?php
                    $party_query=mysqli_query($conn,"SELECT * FROM party ORDER BY party_name") or die(mysqli_error());

                  ?>
                  <label class="col-sm-1 col-sm-1 control-label"><b>Party Name</b></label>
                  <div class="col-sm-12">
                    <select class="form-control" name="party_name" id="part">
                      <option>--Party Name--</option>
                      <option selected><?php echo $row['party_name'] ?></option>
                      <?php while($party_rows=mysqli_fetch_array($party_query)) {?>
                      <option value="<?php echo $party_rows['id']; ?>"><?php echo $party_rows['party_name']; ?></option>
                      <?php }?>
                    </select> 
                   <div id="addr"></div> 
                  </div>
                </div>
                <div class="form-group">
                  <?php
                      $dept_query=mysqli_query($conn,"SELECT * FROM department ORDER BY department_name") or die(mysqli_error());

                  ?>
                  <label class="col-sm-1 col-sm-1 control-label"><b>Department</b></label>
                  <div class="col-sm-12">
                    <select class="form-control" name="department">
                      <option>--Department--</option>
                      <option selected><?php echo $row['department'] ?></option>
                      <?php while($dept_rows=mysqli_fetch_array($dept_query)) {?>
                      <option><?php echo $dept_rows['department_name']; ?></option>
                      <?php }?>
                    </select>  
                  </div>
                </div>
                <div class="form-group">
                  <?php
                      $staff_query=mysqli_query($conn,"SELECT * FROM staff ORDER BY staff_name") or die(mysqli_error());

                  ?>
                  <label class="col-sm-1 col-sm-1 control-label"><b>Staff</b></label>
                  <div class="col-sm-12">
                    <select class="form-control" name="staff">
                      <option>--Staff--</option>
                      <option selected><?php echo $row['staff'] ?></option>
                      <?php while($staff_rows=mysqli_fetch_array($staff_query)) {?>
                      <option><?php echo $staff_rows['staff_name']; ?></option>
                      <?php }?>
                    </select>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12 text-center">
                    <button class="btn btn-theme">Save Changes</button>
                     <button class="btn btn-theme02">Edit Product List</button>
                  </div>
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
  <script type="text/javascript">
    $(document).ready(function()
    {
      $("#part").change(function()
      {
        var id=$(this).val();
        var dataString='id='+id;

        $.ajax(
        {
          type: "POST",
          url: "part_entry.php?id=<?php echo $id;?>",
          data: dataString,
          cache: false,
          success: function(html)
          {
            $("#addr").html(html);
          }
        });

      });
    });
  </script>
</body>

</html>
