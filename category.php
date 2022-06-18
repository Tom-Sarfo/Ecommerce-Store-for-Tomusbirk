<?php 
error_reporting(0);
session_start();
header("Location: index.php");
require_once 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159543135-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-159543135-1');
</script>
<script async data-id="34503" src="https://cdn.widgetwhats.com/script.min.js"></script>





<title>Beautiful Collection of Birk Slippers and Sandals | TomusBirk Shop</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Different Designs of Birk Slippers and Sandals in Ghana, for men and ladies">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<!--<link rel="stylesheet" type="text/css" href="styles/cart.css">-->
<link rel="stylesheet" type="text/css" href="styles/category.css">
<link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
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
	    <span>Call us on: </span>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt=""></div></div>
			
			<div><a href="tel:+233549649770"></a>+233549649770</a></div><span></span>
			<div><a href="tel:+233271000728">+233271000728</a></div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
			<!--<!-logo mobile--->
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
						    	echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt=""><div>'.$fetch['value'].'</div></div></a></div>';
						    }
						}else{
							echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt=""><div>0</div></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt=""><div>0</div></div></a></div>';
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
						    	echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt=""><div>'.$fetch['value'].'</div></div></a></div>';
						    }
						}else{
							echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt=""><div>0</div></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt=""><div>0</div></div></a></div>';
				}
					
				?>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="images/phone.svg" alt=""></div></div>
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
					<div class="home_title">Product Page</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li><a href="category.php">All Product</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row products_bar_row">
					<div class="col">
						<center>
						    <h5>Buy your best quality birk slippers and sandals from TomusBirk the leading online birk store in Ghana.
						    browse through our beautiful designed collections made with love</h5>
						 <!--   <a href="membership/registration.php" class="btn btn-outline-secondary">Sign up</a>-->
							<!--<a href="membership/login.php" class="btn btn-outline-success">Sign in</a>-->
						</center>	
					</div>
				</div>
					
				<div class="row products_row">
					
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/TontoOpenSkyBlue.jpg" alt="Birk Slippers"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Tonto_Open_Sky_Blue" class="product_name_detail">Tonto Open Sky Blue</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢55<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Tonto_Open_Sky_Blue" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Tonto_Open_Sky_Blue"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/TontoOpenWhiteFlower.jpg" alt="Birk Slippers"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Tonto_Open_White_Flower" class="product_name_detail">Tonto Open White Flower</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢55<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Tonto_Open_White_Flower" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Tonto_Open_White_Flower"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/BeadsTriangular.jpg" alt="Birk Slippers"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Beads_Triangular" class="product_name_detail">Beads Triangular</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢75<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Beads_Triangular" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Beads_Triangular"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/TwoBuckleWhiteFlower.jpg" alt="Birk Slippers Two strap"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Two_Buckle_White_flower" class="product_name_detail">Two Buckle White Flower</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢55<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Two_Buckle_White_flower" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Two_Buckle_White_flower"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/BeadsAnt.jpg" alt="Bead Birk Slippers"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Beads_Ant" class="product_name_detail">Beads Ant</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢75<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Beads_Ant" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Beads_Ant"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="images/ElephantNoseShinyWhite.jpg" alt="Birk Slippers"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?pname=Elephant_Nose_Shiny_White" class="product_name_detail">Elephant Nose Shiny White</a></div>
											<div class="product_category">In <a href="category.php">Stock</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<h3><span class="badge badge-success">New</span></h3>
										<div class="product_price text-right">¢65<span>.00</span></div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<a href="product.php?pname=Elephant_Nose_Shiny_White" style="color: Black; font-size: 20px;"><div><div><span>Quick View </span><i class="fa fa-eye"></i></div></div></a>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><a href="product.php?pname=Elephant_Nose_Shiny_White"><img src="images/cart.svg" class="svg" alt=""></a></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				<!-- Boxes -->

		<div class="container-fluid" style="background-color: #e2e2e4; padding: 5px;">

			<div class="owl-carousel owl-theme">
		    <a href="category.php"><img src="images/model1-sunflower-db.jpg" class="img-responsive"></a>
		    <a href="category.php"><img src="images/akomaAngle.jpg" class="img-responsive"></a>
		    <!--<img src="images/sunflower-rw1.jpg" class="img-responsive">-->
		    <a href="category.php"><img src="images/sunflower-lg2.jpg" class="img-responsive"></a>
		    <!--<img src="images/two-buckle-akoma.jpg" class="img-responsive">-->
		    <a href="category.php"><img src="images/sunflower-yg.jpg" class="img-responsive"></a>

		</div>
		</div>
				<!--to add another page of product-->
				<!--<div class="row page_nav_row">-->
				<!--	<div class="col">-->
				<!--		<div class="page_nav">-->
				<!--			<ul class="d-flex flex-row align-items-start justify-content-center">-->
				<!--				<li class="active"><a href="#">01</a></li>-->
				<!--				<li><a href="#">02</a></li>-->
				<!--				<li><a href="#">03</a></li>-->
				<!--				<li><a href="#">04</a></li>-->
				<!--			</ul>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
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
									<p>We Give your beautiful feets the quality it deserve.</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Support</div>
								<ul class="footer_list">
									<li>
										<a href="how_to_make_order.php"><div>How To Make An Order<div class="footer_tag_1">recommeded</div></div></a>
									</li>
									<li>
										<a href="faq.php"><div>Frequently Asked Questions</div></a>
									</li>
									<li>
										<a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
									</li>
									<li>
										<a href="payment.php"><div>How To Make Payment</div></a>
									</li>
									<li>
										<a href="#"><div>About TomusBirk</div></a>
									</li>
								</ul>
							</div>
						</div>

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
									<div class="footer_title">Follow us on:</div>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://tomusbirk.com" target="_blank">TomusBirk.co</a>
</div>
								<nav class="footer_nav ml-md-auto order-md-2 order-1">
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<li><a href="category.html">Women</a></li>
										<li><a href="category.html">Men</a></li>
										<li><a href="category.html">Kids</a></li>
										<li><a href="category.html">Other Product</a></li>
										<li><a href="#">Contact</a></li>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/category.js"></script>
<script src="js/owl-boxes.js"></script>
<script src="js/script.js"></script>
</body>
</html>