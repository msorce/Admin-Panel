<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "demo_store";

	$db_conn= mysqli_connect($host,$user,$password,$dbname);
	if (mysqli_connect_errno()) {
		echo mysqli_connect_error();
		exit();
	} 
 ?>