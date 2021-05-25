<?php 
include "connect.php"; 
//error_reporting(0);

$id=$_GET['id'];


$part= $_POST['id'];



$qprodetails=mysqli_query($conn,"select * from party where id = '$part'") or die (mysqli_error($conn));
$row=mysqli_fetch_array($qprodetails);
$party_id=$row['id'];
$party_name=$row['party_name'];
$qty=1;

?>
              
                              <input type="hidden" name="po_nnno" value="<?php echo $party_id;?>" required>
                              <input type="hidden" name="party_name" value="<?php echo $party_name;?>" required><br>
                               
                               
                                 <input type="hidden"  name="addr" value="<?php echo $row['address1'];?>"required>
                               
                                  
                                  
                                  
             
              
               
                                  