<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}


  $staff_name=$_POST['staff_name'];
  $staff_head=$_POST['staff_head'];
  
  

  $id = $_POST['id'];


  $update_query=mysqli_query($conn,"UPDATE staff SET staff_name ='$staff_name',staff_head ='$staff_head' WHERE id = $id");
  if ($update_query) {
    header('location:view-staff.php');
    echo "updated";
  } else {
    echo "Records not updated";
  }
  



?>