<?php 
session_start();
require_once 'db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script async data-id="34503" src="https://cdn.widgetwhats.com/script.min.js"></script>

<title>How To Make Payment For An Order From TomusBirk</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="How buy birk slippers online">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="icon" type="image/png" href="images/favicon-tomusbirk.png"/>-->
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/loader.css">
</head>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>

<!-- Menu -->

<div style="display:none;" id="masterDiv" class="animate-bottom">
<!-- Menu -->

<div class="menu">

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
	    <span>Call us on: <a href="tel:+233549649770">+233549649770</a></span>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<!--<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>-->
			
			<!--<div><a href="tel:+233549649770"></a>+233549649770</a></div><span></span>-->
			<!--<div><a href="tel:+233271000728">+233271000728</a></div>-->
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
						<!-- make a mobile version of logo here -->
						<!-- <div><img src="images/logo_1.png" alt=""></div> -->
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
					<!--<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>-->
					<div><a href="tel:+233549649770"></a>call us on: +233549649770</a></div>
				    <!--<div><a href="tel:+233271000728">+233271000728</a></div>-->
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
					<div class="home_title">How To Pay For Your Order</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li>How To Make Payment</li>
						</ul>
					</div>
				</div>
			</div>
		</div><br><br>

		<!-- Cart -->
		
            <div class="container-fluid">
                
                <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">How To Make Payment</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title">Procedure For Making Payment:</h6>
                    <p class="card-text" style="text-align: justify;">After making your order succesfully, You are expected to make a down payment, 30% of the product’s price and the rest is paid on delivery. <br> 
                    Send your payment through any of the following Mobile money (MoMo) account by providing your <i style="color: #a300c5;">firstname or Your order ID</i> as a<br>
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
                                            Number: 0203541262</b><br><br>
                                            
                                            <b>Delivery Option:</b><br>
                                            Delivery fee is charged based on the distance of your location. Estimated delivery fee charge for certain areas are as follows:<br><br>
                                            
                                            Kasoa:      ¢25<br>
                                            Tema:      ¢25<br>
                                            Madina and sub areas:      ¢17<br>
                                            East Legon and sub areas:      ¢17<br>
                                            Spintex and sub areas:      ¢18<br>
                                            Osu and sub district:      ¢15<br>
                                            La maami and sub district:      ¢15<br>
                                            Teshie and sub areas:      ¢16<br>
                                            Accra Central:      ¢10<br>
                            
                        <!--NB: Free delivery on Campuses in Accra and Kumasi<br><br>-->
                        Anywhere outside this area will be charged based on the distance of your location.
                                            
                                            
                    </p><br>
                   
                    <a href="membership/registration.php" class="btn btn-success">Sign Up to Start Shopping</a>
                  </div>
                  <div class="card-footer text-muted">
                    <h5>NB: After making order successfully click on the <i style="color:green;"><b> Order invoice </b></i>or <br>
                    check your email to view the details of your order.
                   </h5>
                  </div>
                </div><br><br>
        		<!--<div class="card" style="width: 18rem;">-->
          <!--        <div class="card-body">-->
          <!--          <h5 class="card-title">How To Make An Order From TomusBirk</h5>-->
          <!--          <h6 class="card-subtitle mb-2 text-muted">To make an order please follow these steps:</h6>-->
          <!--          <p class="card-text">1. On the hompage of TomusBirk click on the <i>Sign up to make an order</i> button to-->
          <!--          register if you are a new visitor or click on the menu bar and click sign in to log you in then proceed shopping</p>-->
          <!--          <a href="#" class="card-link">Card link</a>-->
          <!--          <a href="#" class="card-link">Another link</a>-->
          <!--        </div>-->
          <!--      </div>-->
            </div>
            
           <div class="features">
			<div class="container">
				<div class="row">
					
					

					<!-- Feature -->
					 
					<div class="col-lg-12 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="images/delivery.svg" alt="" style='padding: 20px;'></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Fast Delivery On Purchase</div>
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
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#">TomusBirk.co</a>
</div>
								<nav class="footer_nav ml-md-auto order-md-2 order-1">
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<!--<li><a href="#">Women</a></li>-->
										<!--<li><a href="#">Men</a></li>-->
										<!--<li><a href="#">Kids</a></li>-->
										<!--<li><a href="#">Other Products</a></li>-->
										<!--<li><a href="#">Contact</a></li>-->
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
		
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
<script src="js/cart.js"></script>
<script src="js/script.js"></script>
<script src="sweetalert/sweetalert.min.js"></script>

</body>
</html>
