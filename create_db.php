<?php
//creates database demo_store
$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE demo_store";
if (mysqli_query($con,$sql)) {
 header("location:create_db_success.php"); 
} else {
  echo "Error creating database: " . mysqli_error($con);
}
?>