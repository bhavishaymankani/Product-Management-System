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

if (isset($_POST['addrow'])) {
  

$po_no=$_POST['po_no'];
  $items=$_POST['item'];
  $qty=$_POST['qty'];
  $tax=$_POST['tax'];
  $disc=$_POST['disc'];
  $rate=$_POST['rate'];
  $amount=$rate*$qty;
  $disc_amount=$amount*$disc/100; 
  $amount_after_disc=$amount-$disc_amount; 
  $gst_amount=$amount_after_disc*$tax/100;
  $net_amount=$amount+$gst_amount-$disc_amount;
  $po_date=$_POST['po_date'];
  $party_name=$_POST['party_name'];
  $address=$_POST['addr'];
  $depart=$_POST['depart'];
  $staff=$_POST['staff'];



  
   mysqli_query($conn,"INSERT INTO purchase_order(po_no,items,qty,gst,discount,mrp,amount,gst_amount,total_discount,net_amount,po_date,party_name,address,department,staff)VALUES('$po_no','$items','$qty','$tax','$disc','$rate','$amount','$gst_amount','$disc_amount','$net_amount','$po_date','$party_name','$address','$depart','$staff')") or die(mysqli_error($conn));
   /*if ($inq) {
     echo "inserted";
   } else {
    echo "not inserted";
   }*/

}

if (isset($_POST['save'])) {
  $po_code="RDNC00";
  $po_num=$_POST['po_num'];
  $po_date=$_POST['po_date'];
  $party_name=$_POST['party_name_purchase'];
  $address=$_POST['address'];
  $depart=$_POST['depart'];
  $staff=$_POST['staff'];
  $tot_amt=$_POST['tot_amt'];
  $tot_gst=$_POST['tot_gst'];
  $tot_disc=$_POST['tot_disc'];
  $net_amt=$_POST['net_amt'];
  $poq=mysqli_query($conn,"INSERT INTO purchase(po_code,po_number,date,party_name,address,department,staff,gross_amount,discount,tax,net_amount)VALUES('$po_code','$po_num','$po_date','$party_name','$address','$depart','$staff','$tot_amt','$tot_disc','$tot_gst','$net_amt')") or die(mysqli_error($conn));
  if ($poq) {
    header('location:purchase_order_print.php?id='.$id);
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
        <h3><i class="fa fa-angle-right"></i> PO GENERATION</h3>
        <!-- BASIC FORM ELELEMNTS -->
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> PO ENTRY</h4>
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>PO Number</b></label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="po_num" placeholder="--RDNC00--" value="<?php echo "RDNC00".$id;?>" readonly>
                  </div>
                  <label class="col-sm-1 control-label"><b>PO Date</b></label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control form-control-inline input-medium" name="po_date" value="<?php echo date('Y-m-d');?>">
                  </div>
                  <label class="col-sm-1 control-label"><b>Party Name</b></label>
                  <div class="col-sm-2">
                    <?php
                      $sq=mysqli_query($conn,"SELECT * FROM purchase_order WHERE po_no=$id");
                      $sqrow=mysqli_fetch_array($sq);
                    ?>
                              <select class="form-control"name="party_name_opt" id="part">
                                  <option>--Party Name--</option>
                                  <option selected><?php echo $sqrow['party_name'];?></option>
                                  <?php
                                            
                                            $party_query=mysqli_query($conn,"SELECT * FROM party ORDER BY party_name");
                                            while ($party_data=mysqli_fetch_array($party_query)) {
                                            


                                   ?><option value="<?php echo $party_data['id']; ?>"><?php echo $party_data['party_name']; } ?></option>
                                
                                </select>
                                <div id="addr"></div>
                                <input type="hidden" class= "form-control" name="address" value="<?php echo $sqrow['address']; ?>">
                                <input type="hidden" class= "form-control" name="party_name_purchase" value="<?php echo $sqrow['party_name']; ?>">
                            </div>

                  
                </div>
                
                    
                  
                
                <div class="form-group">
                  <label class="col-sm-1 col-sm-1 control-label"><b>Department</b></label>
                  <div class="col-sm-2">
                              <select class="form-control"name="depart">
                                  <option>--DEPARTMENT--</option>
                                  <option selected><?php echo $sqrow['department'];?></option>
                                  <?php 
                                    $dept_query=mysqli_query($conn,"SELECT * FROM department ORDER BY department_name");
                                    while ($dept_query_rows=mysqli_fetch_array($dept_query)) {
                                      
                                    
                                  ?>
                                  <option><?php echo $dept_query_rows['department_name'];?></option>
                                  <?php

                                    }

                                  ?>
                              
                                
                                </select>
                  </div>   
                  <label class="col-sm-1 control-label"><b>Staff</b></label>
                  <div class="col-sm-2">
                    <select class="form-control"name="staff">">
                      <option>--STAFF--</option>
                                  <option selected><?php echo $sqrow['staff'];?></option>
                                  <?php 
                                    $dept_query=mysqli_query($conn,"SELECT * FROM staff ORDER BY staff_name");
                                    while ($dept_query_rows=mysqli_fetch_array($dept_query)) {
                                      
                                    
                                  ?>
                                  <option><?php echo $dept_query_rows['staff_name'];?></option>
                                  <?php

                                    }

                                  ?>
                              
                                
                                </select>
                    </select>
                  </div>
                  
                  </div>
                  
               
                <!-- col-lg-12-->
                <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel" style="box-shadow: 0px 0px 0px;">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Product Details</h4>
                      <div class="form-group">
                        <!-- <div class="col-sm-3"> -->
                            <div class="col-sm-2">
                              <select class="form-control" name="items" id="prod">
                                  <option>--Item Name--</option>
                                  <?php

                                            $product_query=mysqli_query($conn,"SELECT * FROM product ORDER BY product_name");
                                            while ($product_data=mysqli_fetch_array($product_query)) {
                                            


                                   ?><option value="<?php echo $product_data['id'];?>"><?php echo $product_data['product_name'];} ?></option>
                                
                                </select>
                            </div> 
                            <div id="subr"> </div>  
                             <div class="col-sm-1">
                                    <input type="submit" name="addrow" class="btn btn-theme" value="Add Row" >
                                  </div>   
                                  
                         </div> 
              <!-- </form> -->
              <!--  </div>  -->
               <div class="row mb">
          <!-- page start-->
          <div class="content-panel" style="box-shadow: 0px 0px 0px;">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th class="hidden-phone">Rate (per unit)</th>
                    <th class="hidden-phone">Disc%</th>
                    <th class="hidden-phone">Tax%</th>
                    <th class="hidden-phone">Amount</th>
                    <th class="hidden-phone">Tax Amount</th>
                    <th class="hidden-phone">Discount Amount</th>
                    <th class="hidden-phone">Net Amount</th>
                    <th class="hidden-phone">Edit</th> 
                     <th class="hidden-phone">Delete</th> 
                  </tr>
                </thead>
                <tbody id="purchase_items">
                  <?php 
                                      $delete;
                                      $nr=0;
                                      $query=mysqli_query($conn,"SELECT * FROM purchase_order WHERE po_no=$id")or die();
                                      while ($row=mysqli_fetch_array($query)) {
                                        $nr++;
                                        $delete=$row['product_id'];
                                        echo "
                                  <tr class='gradeX'>
                                    <td>".$nr."</td>
                                    <td>".$row['items']."</td>
                                    <td>".$row['qty']."</td>
                                    <td class='hidden-phone'>".$row['mrp']."</td>
                                    <td class='center hidden-phone'>".$row['discount']."</td>
                                    <td class='center hidden-phone'>".$row['gst']."</td>
                                    <td class='center hidden-phone'>".$row['amount']."</td>
                                    <td class='center hidden-phone'>".$row['gst_amount']."</td>
                                    <td class='center hidden-phone'>".$row['total_discount']."</td>
                                    <td class='center hidden-phone'>".$row['net_amount']."</td>
                                    <td><a href='purchase_order_edit.php?poid=".$id."&&polid=$row[product_id]'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a></td>
                                    <td><a href='purchase_order_delete.php?poid=".$id."&&polid=".$delete."' onclick='return ondelete()'><button class='btn btn-danger btn-xs' name='delete'><i class='fa fa-trash-o '></i></button></a></td>
                                  </tr>";

                                  
                                      }

                                      if (isset($_POST['delete'])) {
                                        $dlquery=mysqli_query($conn,"DELETE FROM purchase_order WHERE product_id=$delete") or die("error");
                                            if ($dlquery) {
                                              echo "Records deleted";
                                              ?>
                                              <meta http-equiv="refresh" content="0; URL=http://localhost/RD/purchase_order.php?id=<?php echo $id;?>">

                                              <?php
                                              
                                            } else {
                                              echo "Deletion process failed";
                                            }
                                      }
                                  ?>
                  <script type="text/javascript">
                     function ondelete() {
                      return confirm('Are you sure you want to delete this entry?');
                     }
                  </script>   
                </tbody>
              </table>
           <!--  </form> -->
            </div>
          </div>
          <!-- page end-->
          <!--page start-->
            <div class="content-panel" style="box-shadow: 0px 0px 0px;">
                <table class="table table-hover">
                  <h4><i class="fa fa-angle-right"></i> Total</h4>
                  <hr>
                  <?php
                    $tq=mysqli_query($conn,"SELECT SUM(total_discount),SUM(amount),SUM(gst_amount),SUM(net_amount) FROM purchase_order WHERE po_no=$id") or die(mysqli_error($conn));
                    $tqrow=mysqli_fetch_array($tq);
                    $tot_amt=number_format($tqrow['SUM(amount)'],2);
                    $tot_gst=number_format($tqrow['SUM(gst_amount)'],2);
                    $tot_disc=number_format($tqrow['SUM(total_discount)'],2);
                    $net_amt=number_format($tqrow['SUM(net_amount)'],2);
                    
                    function floatvalue($val){
                                $val = str_replace(",",".",$val);
                                $val = preg_replace('/\.(?=.*\.)/', '', $val);
                                return floatval($val);
                    }  
                    
                  ?>
                  <input type="hidden" name="tot_amt" value="<?php echo floatvalue($tot_amt);?>">
                  <input type="hidden" name="tot_gst" value="<?php echo floatvalue($tot_gst);?>">
                  <input type="hidden" name="tot_disc" value="<?php echo floatvalue($tot_disc);?>">
                  <input type="hidden" name="net_amt" value="<?php echo floatvalue($net_amt);?>">
                  <tbody>
                    <tr>
                      <th>Gross Amount:</th>
                      <td><?php echo $tot_amt;?></td>
                    </tr>
                    <tr>
                      <th>GST:</th>
                      <td><?php echo $tot_gst;?></td>
                    </tr>
                    <tr>
                      <th>Total Discount:</th>
                      <td><?php echo $tot_disc;?></td>
                    </tr>
                    <tr>                      
                      <th>Net Amount:</th>
                      <td><?php echo $net_amt;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-sm-2">
               <button name="save" class="btn btn-theme ">Save & Print</button>
                </form>
              </div>
          <!--page end-->
        </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
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
        <a href="purchase_order.php#" class="go-top">
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
$("#prod").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
type: "POST",
url: "prod_entry.php?id=<?php echo $id;?>",
data: dataString,
cache: false,
success: function(html)
{
$("#subr").html(html);
}
});

});


});
</script>
 <script type="text/javascript">
$(document).ready(function()
{
$("#part").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;

$.ajax
({
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
