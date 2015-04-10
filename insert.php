<?php 
require("db_conn.php");
?>

<?php
// escape variables for security
$productname = mysqli_real_escape_string($db_conn, $_POST['productname']);
$category = mysqli_real_escape_string($db_conn, $_POST['category']);

$sql="INSERT INTO products (productname, category)
VALUES ('$productname', '$category')";

$pid=mysqli_insert_id();

if (!mysqli_query($db_conn,$sql)) {
  die('Error: ' . mysqli_error($db_conn));
}
header("location:inventory.php");
mysqli_close($db_conn);
?>