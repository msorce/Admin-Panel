<?php  
include_once("db_conn.php"); // connects to database

// structure of products table
$tbl_products = "CREATE TABLE IF NOT EXISTS products (
              id INT(11) NOT NULL AUTO_INCREMENT,
              productname VARCHAR(16) NOT NULL,
			  category VARCHAR(16) NOT NULL,
			  PRIMARY KEY (id),
			  UNIQUE KEY productname (productname) 
             )";
//creates products table in database
$query = mysqli_query($db_conn, $tbl_products);
if ($query === TRUE) {
	header("location:create_table_success.php"); 
} else {
	echo "products table not created"; 
}

?>