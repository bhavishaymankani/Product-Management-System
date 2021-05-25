<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}

  $pay_amount=$_POST['pay_amount'];
  $pending_amount=$_POST['pending_amount']-$pay_amount;
  $payment_method=$_POST['payment_method'];
  

  $id = $_POST['id'];


  $update_query=mysqli_query($conn,"UPDATE purchase SET pending_amount ='$pending_amount',paid_amount ='$pay_amount',payment_method='$payment_method' WHERE id = $id");
  if ($update_query) {
    header('location:acc-po.php');
    echo "updated";
  } else {
    echo "Records not updated";
  }
  



?>