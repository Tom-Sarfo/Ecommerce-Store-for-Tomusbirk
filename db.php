<?php

$con = mysqli_connect("localhost", "main", "pass", "main_Db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
