<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}


  $party_name=$_POST['party_name'];
  $db_id=$_POST['db_id'];
  $pan=$_POST['pan'];
  $dl_no=$_POST['dl_no'];
  $gstin=$_POST['gstin'];
  $addr1=$_POST['addr1'];
  $addr2=$_POST['addr2'];
  $email=$_POST['email'];
  $state=$_POST['state'];
  $pin=$_POST['pin'];

  $id = $_POST['id'];


  $update_query=mysqli_query($conn,"UPDATE party SET party_name ='$party_name',drug_bazar_id ='$db_id',pan ='$pan',dl_no = '$dl_no',gstin = '$gstin',address1 = '$addr1',address2 = '$addr2',email = '$email',state = '$state',pin = '$pin' WHERE id = $id");
  if ($update_query) {
    header('location:view-all-party.php');
    echo "updated";
  } else {
    echo "Records not updated";
  }
  
  



/*$_POST['pn'];
$_POST['pan'];
$_POST['dl'];
$_POST['adr'];
$_POST['st'];
$_POST[''];
$_POST[''];*/



?>