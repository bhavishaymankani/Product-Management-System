<?php
//session_start();
include('connect.php');

/*$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}*/

$poid = $_GET['poid'];
$polid = $_GET['polid'];
echo $polid;

$query=mysqli_query($conn,"DELETE FROM purchase_order WHERE product_id=$polid") or die("error");
if ($query) {
	echo "Records deleted";
	
} else {
	echo "Deletion process failed";
}

  


?>