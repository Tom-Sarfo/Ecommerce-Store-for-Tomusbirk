<?php 
error_reporting(0);
session_start();
require_once 'db.php';

if(ISSET($_SESSION['username'])){
$id = $_POST["id"];
$nameProduct = $_POST["nameProduct"];
$priceProduct = $_POST["priceProduct"];
$sizeProduct = $_POST["sizeProduct"];

//chech to see if the same product exist in Cart
$query = "SELECT * FROM `shopping_cart` WHERE `mem_id` = '$id' AND `nameProduct` = '$nameProduct'";
$final = mysqli_query($con, $query);
if (mysqli_num_rows($final) > 0) {
      		$request = "UPDATE `shopping_cart` SET `nameProduct` = '$nameProduct', `price` = '$priceProduct', `size` = '$sizeProduct', `quantity`= 1 WHERE `mem_id` = '$id' AND `nameProduct` = '$nameProduct'";
      		$done = mysqli_query($con, $request);
	      	echo $nameProduct." has been added to cart successfully";

}else{

$sql = "INSERT INTO `shopping_cart` VALUES (0, '$nameProduct', '$priceProduct', '$sizeProduct', 1, '$id')";
$result = mysqli_query($con, $sql);

if ($result) {
	echo $nameProduct." has been added to cart successfully";
}else{
	echo("Error description: " . mysqli_error($con));
}

}

}else{
	echo "Please login to continue shopping";
}


//echo $sizeProduct;


// if(ISSET($_SESSION['user'])){

// 	try{
// 	$nameProduct = $_POST["nameProduct"];
//  	$id = $_POST["id"];
//  	$sizeProduct = $_POST["sizeProduct"];
//  	$priceProduct = $_POST["priceProduct"];
//  	$numProduct = $_POST["numProduct"];
// // work from here try to find the id of the product and add to the query below
//  	$query = "SELECT * FROM `shopping_cart` WHERE `mem_id` = '$id' AND `nameProduct` = '$nameProduct'";
//  	$final = mysqli_query($connect, $query);
// 		if (mysqli_num_rows($final) > 0) {
//       		$request = "UPDATE `shopping_cart` SET `nameProduct` = '$nameProduct', `sizeProduct` = '$sizeProduct', `price_product` = '$priceProduct', `quantity_product`= '$numProduct' WHERE `mem_id` = '$id' AND `nameProduct` = '$nameProduct'";
//       		$done = mysqli_query($connect, $request);
// 	      	echo $nameProduct." has been added to cart successfully";

// 		}else{       


	
// 	 $sql = "INSERT INTO `shopping_cart` VALUES ('', '$nameProduct', '$sizeProduct', '$priceProduct', '$numProduct', '$id')";  
// 	 $conn->exec($sql);
// 	      	echo $nameProduct." has been added to cart successfully";
// 	 	}
// 			}catch(PDOException $e){
// 				echo $e->getMessage();
// 		} 
// }else{
// 	echo "Sign in to add items to cart";
// }	

 

//echo $nameProduct;
 ?>
