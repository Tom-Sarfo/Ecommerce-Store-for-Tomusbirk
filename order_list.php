<?php 
session_start();
require_once 'db.php';
require_once 'random_string.php';

if (isset($_SESSION['username'])) {
	
$id = $_POST['id'];
$location = $_POST['location'];
$loc_spec = $_POST['loc_spec'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = date("Y-m-d H:i:s");


// this is the query to bring all products from the shopping cart and make it available to this page
$sql = "SELECT * FROM `shopping_cart` WHERE `mem_id`='$id'"; 
  $res = mysqli_query($con, $sql);

      if(mysqli_num_rows($res) > 0){  
        while($fetch = mysqli_fetch_array($res)) {
          $name = $fetch['nameProduct'];
          $size = $fetch['size'];
          $quantity = $fetch['quantity'];
          $price = $fetch['price'];
          $mem_id = $fetch['mem_id'];
          $product_id = $fetch['id_product'];
          $total = $price * $quantity;
          $strg = random_strings(6);

// if order already exist update order list for a particular user
      $query = "SELECT * FROM `order_list` WHERE `mem_id` = '$id' AND `nameProduct` = '$name'"; 
      $final = mysqli_query($con, $query);
    if (mysqli_num_rows($final) > 0) {
          $request = "UPDATE `order_list` SET `firstname` = '$firstname', `lastname` = '$lastname', `nameProduct` = '$name', `sizeProduct` = '$size', `priceProduct` = '$price', `quantity`= '$quantity', `location`= '$location', `detail_location` = '$loc_spec', `email`= '$email', `phone`= '$phone', `date`= '$date', `order_reference`= '$strg', `order_status`='Not Confirmed' WHERE `mem_id` = '$id' AND `nameProduct` = '$name'";
          $done = mysqli_query($con, $request);
          if ($done) {
            echo "your order has been updated";
          }else{
            echo ("Error description: " . $con-> error);
          }
          //echo "Your order has been made successfully";

    }else {       
// if it doesnt exist create order for the user
          $sqli = "INSERT INTO `order_list` VALUES (0,'$firstname', '$lastname', '$name', '$size', '$price', '$quantity', '$location', '$loc_spec', '$email', '$phone', '$date', '$id', '$strg', 'Not Confirmed')";
          $result = mysqli_query($con, $sqli);
        }

        require 'PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->setFrom('ordermanagement@tomusbirk.com', 'Tomusbirk');
                $mail->addAddress($email, $firstname);
                $mail->Subject = 'Order made from Tomusbirk';
                $mail->isHTML(true);
                $mail->Body = "<h5><b>Hi! $firstname, </b></h5><br>
                <p>Your order from TomusBirk has been made successfully. Please click the link below to download the invoice and view the details of your order.<br>
                Thank you.</p><br><br><br>";
                
                $mail->AltBody = "Your order from TomusBirk has been made successfully. Visit Tomusbirk and dowload your order invoice";
                
                
                // send order list to customerservice and partners or staffs
                $mail = new PHPMailer;
                $mail->setFrom('ordermanagement@tomusbirk.com', 'Tomusbirk');
                $mail->addAddress('tomsarfodavis@gmail.com', 'Erasmus');
                // $mail->addAddress('tomusbirkfootwear@gmail.com', 'Tomusbirk');
                $mail->Subject = 'Order made from Tomusbirk';
                $mail->isHTML(true);
                $mail->Body = "<h5><b>Hello staff, </b></h5><br>
                <p>An order has been made from TomusBirk successfully. Please click the link below to view the details of the order.<br>
                Thank you.</p><br><br><br>
                <h3><a href='https://www.tomusbirk.com/account/new_orders.php'>View Order</a></h3>";
                
                $mail->AltBody = "An order has been made from TomusBirk successfully. sign into Tomusbirk and view the order made";
                
                
                if(!$mail->send()) {
                  echo 'Message was not sent.';
                  echo 'Mailer error: ' . $mail->ErrorInfo;
                  
                } else {
                 // echo 'Message has been sent.';
          //     echo "Your order has been made successfully!";
          //     echo "\n";
          // echo 'Your order reference code is '.$strg; 
              }

}
           
       // }else{
       //     echo ("Error description: " . $con-> error);
       // }
}else{
  echo "Your cart is empty";
}
}

//echo $loc_spec;

 ?>

