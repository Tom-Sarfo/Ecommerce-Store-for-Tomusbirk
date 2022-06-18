<?php 
error_reporting(0);
//session_start();
require_once 'db.php';

$id = $_POST['id'];
$sql = "DELETE FROM shopping_cart WHERE mem_id = '$id'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Cart Cleared';  
 }else{
     echo 'Cart is already empty';
 }  
 ?>