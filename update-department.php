<?php
session_start();
include('connect.php');
//error_reporting(0);

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}


  $dept_name=$_POST['dept_name'];
  $hod=$_POST['hod'];
  
  

  $id = $_POST['id'];


  $update_query=mysqli_query($conn,"UPDATE department SET department_name ='$dept_name',hod ='$hod' WHERE id = $id");
  if ($update_query) {
    header('location:view-department.php');
    echo "updated";
  } else {
    echo "Records not updated";
  }
  



?>