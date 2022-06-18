<?php 
error_reporting(0);
//session_start();
require_once 'db.php';

$id = $_POST['id'];
$sql = "DELETE FROM order_list WHERE mem_id = '$id'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Your order has been cancelled';  
 }else{
     echo 'Order list is already empty';
 } 
 ?>