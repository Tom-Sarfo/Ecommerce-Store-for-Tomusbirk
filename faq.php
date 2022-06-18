<?php 
session_start();
require_once 'db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Frequently Asked Questions | TomusBirk</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Tomusbirk Shopping Cart">
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
	    <span>Call us on: </span>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			
			<div><a href="tel:+233549649770"></a>call us on: +233549649770</a></div><span></span>
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
					<div class="home_title">FAQ's</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li>FAQ's</li>
						</ul>
					</div>
				</div>
			</div>
		</div><br><br>

		<!-- Cart -->
		
            <div class="container-fluid">
                
                <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Frequently Asked Questions (FAQ's)</h5>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title">Dont hesitate to call or send us a message if you don't find answer to your questions</h6>
                    <p class="card-text" style="text-align: justify;"><b style="font-size: 20px; color: #111111;">
                        1. When would I get it after making the order?</b><br><br>
                         You get your order at most fours days after the day of placing order provided
                         Your location is in Greater Accra and surrounding areas. <br>
                        If you are ordering from Kumasi (KNUST, Asafo, Ayeduase etc) you get it on the next Monday after the day of placing order.<br>
                        NB: Other locations aside Accra and Kumasi are calculated based on 	distance and cost of delivery.<br><br>
                   <b style="font-size: 20px; color: #111111;">2.
                       How solid is your foundation or the Under of your footwear?
                    </b><br><br>
                    Our foundation is one of best made from EVA material (Ethylene-vinyl acetate). <br>
                    The best material highly recommended by Professional footwear manufacturers worldwide for moulding out soles.<br><br>
                    
                   <b style="font-size: 20px; color: #111111;">3.Is it Birkenstock?</b><br>
                   <b>No.</b>
                   These footwears are proudly made with love by professional Ghanaian shoe manufacturers working with <b>TomusBirk</b><br>
                   to bring to you the value you deserve.<br><br>
                   <b style="font-size: 20px; color: #111111;">4. What is your return policy?</b><br>
                   You only return the product when there is a production fault and has not been worn for a week after placing order.<br>
                   After One week of placing order, it cannot be return.<br><br>
                   <b style="font-size: 20px; color: #111111;">4. What is your return policy? </b><br>
                   You only return the product when there is a production fault and has not been worn for a week after placing order.<br>
                   After One week of placing order it cannot be return.<br><br>
                   <b style="font-size: 20px; color: #111111;">5. I want to retail your product </b><br>
                   Well you have come to the right place.
                    We have a flexible plan for retailers which include a flexible price to get you started. <Br>
                    For mor information about our retail policy, feel free to Call or whatsapp us on <a href="tel:+223549649770"> 0549649770 </a>or <a href="tel:+223271000728">0271000728</a><br><br>
                    <b style="font-size: 20px; color: #111111;">6. facts about our product</b><br>
                    Our product comes in unique designed features which makes you stand out from the crowd. <br>
                    We take our time to mould our footwear to suit your beautiful aspirations. <br>
                    We provide your  beautiful feet with the quality it deserves.<br><br>
                    <b style="font-size: 20px; color: #111111;">7. How do i make payment for my order?</b><br><br>
                    <b style="font-size: 20px; color: #111111;"><i>Procedure For Making Payment:</i></b><br>
                    Send the Money through Mobile money (MoMo) by providing your firstname as a<br>
                    Reference Number. <br><br>
                    <b>Mobile Money Account Information:<br><br>

                    MTN<br>
                    Account Name: Erasmus Simons<br>
                    Number: 0556527364<br><br>
                    
                    TIGO<br>
                    Account Name: Charles Boadu<br>
                    Number: 0271000728<br><br>
                    
                    VODAFONE<br>
                    Account Name: Erasmus Simons<br>
                    Number: 0203541262</b><br> 
                   
                    
                    
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
