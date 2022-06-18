<?php
error_reporting(0);
session_start();
require_once 'db.php';

if (!isset($_SESSION['user'])) {
	header("Location: category.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
<script async data-id="34503" src="https://cdn.widgetwhats.com/script.min.js"></script>
<title>Checkout</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Your home of original birk slippers and sandals">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<!-- Menu -->

<div class="menu">
	
	<!-- Navigation -->
	<div class="menu_nav" style="padding: -20px;">
		<ul>
		    <li>
				<a href="#">
				<?php
				if (isset($_SESSION['user'])) {
					echo $_SESSION['username'];
				}
				 
				?>
			 	
			 </a></li><span></span><br>
			<li><a href="membership/login.php">Sign In</a></li>
			
		</ul>
	</div><span></span><br><br><br>
	<div>
	    <a href="membership/logout.php" type="button" class="btn btn-danger">Log Out</a>
	</div>
	<!-- Contact Info -->
	
	<div class="menu_contact">
	    <span>Call us on: </span>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			
			<div><a href="tel:+233549649770"></a>+233549649770</a></div><span></span>
			<div><a href="tel:+233271000728">+233271000728</a></div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="https://web.facebook.com/tomusbirk/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/_tomusbirk/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><a href="index.php"><img src="images/logo6.png" alt="TomusBirk Birk store"></a></div>
					</div>
				</a>	
			</div>
			
			<!-- logo mobile -->
			<div class="logo-mobile">
				<a href="#">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><a href="index.php"><img src="images/logo6.png" alt="TomusBirk Birk store"></a></div>
						<!-- make a mobile version of logo here -->
						<!-- <div><img src="images/logo_1.png" alt=""></div> -->
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				
				<!-- User -->
				<?php 
				if (isset($_SESSION['user'])) {
					$id = $_SESSION['user'];
					$sql = "SELECT COUNT(order_id) AS value FROM order_list WHERE mem_id = '$id'"; 
					$res = mysqli_query($con, $sql);

						if(mysqli_num_rows($res) > 0){ 	
						    while($fetch = mysqli_fetch_array($res)) {
						    	echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>'.$fetch['value'].'</div></div></a></div>';
						    }
						}else{
							echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>0</div></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>0</div></div></a></div>';
				}
					
				?>
				<!-- Cart -->
				<?php 
				if (isset($_SESSION['user'])) {
					$id = $_SESSION['user'];
					$sql = "SELECT COUNT(id_product) AS value FROM shopping_cart WHERE mem_id = '$id'"; 
					$res = mysqli_query($con, $sql);

						if(mysqli_num_rows($res) > 0){ 	
						    while($fetch = mysqli_fetch_array($res)) {
						    	echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"><div>'.$fetch['value'].'</div></div></a></div>';
						    }
						}else{
							echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"><div>0</div></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"><div>0</div></div></a></div>';
				}
					
				?>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div><a href="tel:+233549649770"></a>call us on: +233549649770</a></div>
				    <div><a href="tel:+233271000728">+233271000728</a></div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Place Order</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li>Place Order</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Provide Your information</div>
							<div class="checkout_form_container">
								<form action="#" id="checkout_form" class="checkout_form">
									<div class="row">
										<div class="col-lg-6">
											<!-- Name -->
											<input type="text" id="checkout_name" class="checkout_input firstname" placeholder="First Name" required="required">
										</div>
										<div class="col-lg-6">
											<!-- Last Name -->
											<input type="text" id="checkout_last_name" class="checkout_input lastname" placeholder="Last Name" required="required">
										</div>
									</div>
										<!-- Company -->
									<!-- <div>
										<input type="text" id="checkout_company" placeholder="Company" class="checkout_input">
									</div> -->
									<div>
										<!-- Country -->
										<!-- <select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
											<option>Country</option>
											<option>Ghana</option>
										</select> -->
									</div>

									<div>
										<!-- City / Town -->
										<select name="checkout_city" id="checkout_city" class="dropdown_item_select checkout_input location" require="required">
											<option>Your Location</option>
											<option>Other</option>
										      <option>University Of Ghana Campus</option>
										      <!--<option>KNUST Campus</option>-->
										      <option>UPSA Campus</option>
										      <option>ATU Campus</option>
										      <!--<option>Other Campuses in Accra</option>-->
										      <!--<option>Other Campuses in Kumasi</option>-->
										      <option>Accra Centra</option>
										      <option>Tema</option>
										      <option>Kasoa</option>
										      <option>Madina and sub areas</option>
										      <option>East Legon and sub areas</option>
										      <option>Spintex and sub areas</option>
										      <option>Osu and sub district</option>
										      <option>Teshie and sub areas</option>
										      <option>La maami and sub district</option>
										</select>
									</div>
									<div class="coupon_text">After selecting the above option,
									Please give a detail description of your location in the box below.</div>
									<div>
										<!-- Address -->
										<textarea id="checkout_address" class="checkout_input loc_spec" placeholder="e.g. Accra-Dansoman-Sahara opposite Total filling station" required="required"></textarea>
										
									</div>

										<!-- Zipcode -->
									<!-- <div>
										<input type="text" id="checkout_zipcode" class="checkout_input" placeholder="Zip Code" required="required">
									</div>
										 -->
										<!-- Province -->
									<!-- <div>
										<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
											<option>Province</option>
											<option>Province</option>
											<option>Province</option>
											<option>Province</option>
											<option>Province</option>
										</select>
									</div> -->
									<div>
										<!-- Phone no -->
										<input type="phone" id="checkout_phone" class="checkout_input phone" placeholder="Phone No." required="required">
									</div>
									<div>
										<!-- Email -->
										<input type="email" id="checkout_email" class="checkout_input email" placeholder="Email" required="required" data-validate = "Valid email is: a@b.c">
									</div>

									<div class="checkout_extra">
										<ul>
											<!-- <li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_1" name="billing_checkbox" class="billing_checkbox">
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Terms and conditions</span>
												</label>
											</li>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_2" name="billing_checkbox" class="billing_checkbox">
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Create an account</span>
												</label>
											</li> -->
											<!--<li class="billing_info d-flex flex-row align-items-center justify-content-start">-->
											<!--	<label class="checkbox_container">-->
											<!--		<input type="checkbox" id="cb_3" name="billing_checkbox" class="billing_checkbox">-->
											<!--		<span class="checkbox_mark"></span>-->
											<!--		<span class="checkbox_text">Subscribe to our newsletter</span>-->
											<!--	</label>-->
											<!--</li>-->
										</ul>

										<div class="cart_extra_title">Delivery Method</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">Madina and Sub Area</span>
											</label>
											<div class="shipping_price ml-auto">¢17</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">Spintex and sub areas</span>
											</label>
											<div class="shipping_price ml-auto">¢17</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">East Legon and sub areas</span>
											</label>
											<div class="shipping_price ml-auto">¢17</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">Accra Central</span>
											</label>
											<div class="shipping_price ml-auto">¢10</div>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">Tema</span>
											</label>
											<div class="shipping_price ml-auto">¢25</div>
										</li>

										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												
												<span class=""></span>
												<span class="">Kasoa</span>
											</label>
											<div class="shipping_price ml-auto">¢25</div>
										</li>
									</ul><br>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<?php
										$id = $_SESSION['user'];
										$sql = "SELECT SUM(`quantity` * `price`) AS amount FROM `shopping_cart` WHERE `mem_id` = '$id'"; 
										  $res = mysqli_query($con, $sql);

									      if(mysqli_num_rows($res) > 0)  
									      {   
									        while($fetch = mysqli_fetch_array($res)) {
									        	$totals = $fetch['amount'];

									        	echo '<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">¢'.$totals.'</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Delivery</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">¢'.$totals.'</div>
									</li>';

									        	}
										}else{
											echo 'nothing';
										}	 

									?>
								</ul>
								<div class="payment_options">
									<div class="checkout_title">Payment</div><br>
									 <b style="font-size: 20px; color: #111111;"><i>Procedure For Making Payment:</i></b><br>
                                            Send the payment through any of the following Mobile money (MoMo) account by providing your firstname or your Order Id as a<br>
                                            Reference Number. <br><br>
                                            <b>Mobile Money Account Information:<br><br>
                        
                                            MTN<br>
                                            Account Name: Erasmus Simons<br>
                                            Number: 0556527364<br><br>
                                            
                                            AIRTELTIGO<br>
                                            Account Name: Charles Boadu<br>
                                            Number: 0271000728<br><br>
                                            
                                            VODAFONE<br>
                                            Account Name: Erasmus Simons<br>
                                            Number: 0203541262</b><br> 
									<!--payment process should be highlighted here-->
									
								</div>
								<div class="cart_text">
									<p style="color: #e10620;"><b>NB: After placing order successfully, You are expected to make a down payment of 30% the product’s price and the rest is paid on delivery.</b></p>
								</div>
								<?php
									if(ISSET($_SESSION['user'])){
										//$connect = mysqli_connect("localhost", "root", "", "tomusbirk"); 

										$id = $_SESSION['user']; 
									 		echo '<div class="checkout_button trans_200" data-id4="'.$id.'" id="btn_order"><a href="#">place order</a></div>';
									}else{
										echo '<div class="checkout_button trans_200 btn_order"  id="btn_order"><a href="">place order</a></div>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			<!-- Features -->
		<a href="how_to_make_payment_delivery.php" class="btn btn-outline-success">How to make payment and delivery</a><br>

		<div class="features">
			<div class="container">
				<div class="row">
					
					

					<!-- Feature -->
					 
					<div class="col-lg-12 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
									<div class="feature_icon"><img src="images/delivery.svg" alt="" style="padding: 20px;"></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Fast Delivery on Purchase</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>


		<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">
						
						<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><a href="index.php"><img src="images/logo6.png" alt="TomusBirk Birk Store"></a></div>
										</div>
									</a>		
								</div>
								<div class="footer_about_text">
									<p>Your feet deserve better!</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							<div class="footer_contact">
								<!--<div class="footer_title">Stay in Touch</div>-->
								<!--<div class="newsletter">-->
								<!--	<form action="#" id="newsletter_form" class="newsletter_form">-->
								<!--		<input type="email" class="newsletter_input" placeholder="Subscribe to our Newsletter" required="required">-->
								<!--		<button class="newsletter_button">+</button>-->
								<!--	</form>-->
								<!--</div>-->
								<div class="footer_social">
									<div class="footer_title">Connect with us on:</div>
									<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
										<li><a href="https://web.facebook.com/tomusbirk/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="https://www.instagram.com/_tomusbirk/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
									<div class="copyright order-md-1 order-2"><!-- TomusBirk has it now thank you-->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://tomusbirk.com" target="_blank">TomusBirk.co</a>
</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
		
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
<script src="sweetalert/sweetalert.min.js"></script>

</body>
</html>
