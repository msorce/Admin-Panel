<?php 
require("db_conn.php");
?>
<?php 
if(isset($_GET['deleteid'])){
    echo'Are you sure you want to delete item ' . $_GET['deleteid'] . '? <a href="inventory.php?yesdelete='.$_GET['deleteid'].'">Yes</a>|<a href="inventory.php">No</a>';
      exit();
}
 ?>
 <?php 
if(isset($_GET['yesdelete'])) {
  //delete item from database
  $id_to_delete=$_GET['yesdelete'];
  $sql=mysqli_query($db_conn, "DELETE FROM products WHERE id='$id_to_delete'LIMIT 1") or die(mysqli_error($db_conn));
  header("location:inventory.php");
  exit();
}
  ?>
<?php
 //grabs whole list for viewing 
$product_list="";
$sql = mysqli_query($db_conn, "SELECT * FROM products");
$productCount = mysqli_num_rows($sql); // counts products
if($productCount > 0){
 	while($row = mysqli_fetch_array($sql)){
 		$id = $row["id"];
 		$productname = $row["productname"];
 		$category = $row["category"];
 		$product_list .=" $id - $productname - $category &nbsp;&nbsp;&nbsp; <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory.php?deleteid=$id'>delete</a><br/>";
 	}
 } else {
 	$product_list = "You have no products listed in your store.";
 }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
   <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/main.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- toggle for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Admin Home</a></li>
        <li><a href="inventory.php">Manage Inventory</a></li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="jumbotron">
    <div class="container">
      <h2>Manage Inventory</h2>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <h2>Inventory List</h2>
        <button type="button" class="btn btn-default"><a href="additem.php">+ Add Item</a></button><br>
        <?php echo $product_list; ?> <!-- shows product list -->
      
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
</body>
</html>