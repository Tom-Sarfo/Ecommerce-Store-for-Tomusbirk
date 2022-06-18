<?php 
error_reporting(0);
require_once('db.php');

$id = $_POST["id1"];

$sql = "UPDATE shopping_cart SET quantity = quantity - 1 WHERE id_product = '$id'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){ 	
	//
}else{
	echo "No data in Shopping cart";
}
  



?>