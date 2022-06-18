<?php
error_reporting(0);
session_start();
require_once 'db.php';

if (!isset($_SESSION['user'])) {
	header("Location: membership/login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script async data-id="34503" src="https://cdn.widgetwhats.com/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-179121337-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-179121337-1');
</script>



<title>My Order Page</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Order Birk online in Ghana">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="icon" type="image/png" href="images/favicon-tomusbirk.png"/>-->
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" type="text/css" href="styles/main_styles.css"> -->
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/loader.css">
</head>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>

<!-- Menu -->

<div style="display:none;" id="masterDiv" class="animate-bottom">

<div class="menu">

	<!-- Search -->
	<!-- Search button goes here someday -->
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
							echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>';
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
					<div class="home_title">My Order List</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li>My Order</li>
						</ul>
					</div>
				</div>
			</div>
		</div><span></span><br><br>
		
		<div class="container-fluid ">
			<!-- print a order success message with bootstrap alert when order is made -->
			<?php 

			if (!isset($_GET['w'])) {
				///....
			}elseif ($_GET['w'] == 'success') {
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<center><strong>Well done! </strong>Your Order has been made successfully. Don\'t forget to download the order invoice below</center><button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>';
			}

			?>
	
		</div>

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Order made</li>
									<li>Order Invoice</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<?php
										if (isset($_SESSION['user'])) {

										$id = $_SESSION['user'];
										$sql = "SELECT * FROM `order_list` WHERE `mem_id`='$id' ORDER BY order_id DESC"; 
										$res = mysqli_query($con, $sql);

										  	if(mysqli_num_rows($res) > 0){ 	
										      while($fetch = mysqli_fetch_array($res)) {
										      	$name = $fetch["nameProduct"];	       
											    $s = ucfirst($name);
											    $bar = ucwords(strtolower($s));
												$data = preg_replace('/\s+/', '', $bar);

										      	echo '<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
												<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
													<div><div class="product_image"><img src="images/'.$data.'.jpg" alt=""></div></div>
													<div class="product_name_container">
														<div class="product_name"><a href="product.php">'.$name.'</a></div>
														<div class="product_text">This order was made at  '.$fetch["date"].'</div>
													</div>
												</div>
												<div class="product_color product_text"><span></span><a href="invoice/index.php?oid='.$id.'"><i class="fa fa-file-pdf-o" style="font-size: 50px;"><p style="font-size: 10px;">Download invoice</p></i></a></div>

											</li>';
										      }
										    } 
										}else{
											echo "<p>Your order list is empty<a href='index.php'> click here</a> to continue shopping";
										}
										
									?>

									<!-- Cart Item -->
									

									<!-- <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_number">1</div></div>
											<div><div class="product_image"><img src="images/TontoOPenWHiteFlower.jpg" alt=""></div></div>
											<div class="product_name_container">
												<div class="product_name"><a href="product.html">Cool Flufy Clothing without Stripes</a></div>
												<div class="product_text">Second line for additional info</div>
											</div>
										</div>
										<div class="product_color product_text"><span></span><a href=""><i class="fa fa-file-pdf-o" style="font-size: 50px;"><p style="font-size: 10px;">Download invoice</p></i></a></div>
										
									</li> -->
								</ul>
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<?php
									require_once 'db.php';

										if(ISSET($_SESSION['user'])){
											$id = $_SESSION['user'];

											echo '<div class="button button_clear trans_200" data-id6="'.$id.'" id="clear_order"><a href="#">Clear order</a></div>';
										}
									?>
									<div class="button button_continue trans_200"><a href="category.php">Continue Shopping</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--features-->
		
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
								<div class="feature_title">Delivery on Purchase</div>
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