<?php
session_start();
include('connect.php');

$user=$_SESSION['username'];

if ($user) {
  
} else {
  header('location:index.php');
}

$id = $_GET['id'];

$query=mysqli_query($conn,"DELETE FROM staff WHERE id=$id");
if ($query) {
	echo "Records deleted";
	?>
	<meta http-equiv="refresh" content="0; URL=http://localhost/RD/view-staff.php">

	<?php
} else {
	echo "Deletion process failed";
}

  


?>