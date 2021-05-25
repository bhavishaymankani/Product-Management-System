<?php 
include "connect.php"; 
//error_reporting(0);

$id=$_GET['id'];


$prod= $_POST['id'];



$qprodetails=mysqli_query($conn,"select * from product where id = '$prod'") or die (mysqli_error($conn));
$row=mysqli_fetch_array($qprodetails);
$pid=$row['id'];
$itemg=$row['product_name'];
$qty=1;

?>
              
                              <input type="hidden" name="po_no" value="<?php echo $id;?>" required>
                              <input type="hidden" name="item" value="<?php echo $itemg;?>" required>
                              <div class="col-sm-2">  
                               
                                 <input type="number" class="form-control" placeholder="Qty"name="qty" value="<?php echo $qty;?>"required>
                              </div> 
                                  <div class="col-sm-2">
                                      
                                    <input type="number" class="form-control" placeholder="Rate (per unit)"name="rate" value="<?php echo $row['mrp'];//echo $product_data['mrp'];?>"required>
                                  
                                  </div> 
                                  <div class="col-sm-2">
                                    <input type="number" class="form-control" placeholder="Disc%"name="disc">
                                  </div> 
                                  <div class="col-sm-2">
                                    <input type="number" class="form-control" placeholder="Tax"name="tax" value="<?php echo $row['gst'];?>"required>
                                  </div> 
                                  
                                  </div> 
             
              
               
                                  