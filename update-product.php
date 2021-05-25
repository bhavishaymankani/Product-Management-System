<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}


  $prod_name=$_POST['prod_name'];
  $manf=$_POST['manf'];
  $packing=$_POST['packing'];
  $hsn=$_POST['hsn'];
  $gst=$_POST['gst'];
  $mrp=$_POST['mrp'];
  $trd_prc=$_POST['trd_prc'];
  

  $id = $_POST['id'];


  $update_query=mysqli_query($conn,"UPDATE product SET product_name ='$prod_name',manufacturer ='$manf',packing ='$packing',hsn_no = '$hsn',gst = '$gst',mrp = '$mrp',trade_price = '$trd_prc' WHERE id = $id");
  if ($update_query) {
    header('location:view-products.php');
    echo "updated";
  } else {
    echo "Records not updated";
  }
  



?>