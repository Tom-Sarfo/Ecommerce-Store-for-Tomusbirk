<?php
error_reporting(0);
 header("Location: index.html");
    exit();
session_start();
require_once 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script async data-id="34503" src="https://cdn.widgetwhats.com/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->

<title>Buy Quality Birk Slippers And Sandals | TomusBirk</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Buy your birk slippers and sandals in Ghana">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="icon" type="image/png" href="images/favicon-tomusbirk.png"/>-->
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/site.webmanifest">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/flexslider/flexslider.css">
<!--<link rel="stylesheet" type="text/css" href="styles/main_styles.css">-->
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
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
	    <span>Call us on: +233549649770</span>
		<!--<div class="menu_phone d-flex flex-row align-items-center justify-content-start">-->
		<!--	<div><div><img src="images/phone.svg"></div></div>-->
			
		<!--	<div>+233549649770</div><span></span>-->
		<!--	<div>+233271000728</div>-->
		<!--</div>-->
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
						    	echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg"><div>'.$fetch['value'].'</div></div></a></div>';
						    }
						}else{
							echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt=""></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="your_order.php"><div><img src="images/user.svg" alt=""></div></a></div>';
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
							echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt=""></div></a></div>';
						}
				}else{
					echo '<div class="user"><a href="cart.php"><div><img class="svg" src="images/cart.svg" alt=""></div></a></div>';
				}
					
				?>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<!--<div><div><img src="images/phone.svg" alt=""></div></div>-->
					<div>call us on: +233549649770</div>
				    <!--<div>+233271000728</div>-->
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
					<div class="home_title">Product Details</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Home</a></li>
							<li><a href="category.php">Product details</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><br>
		<div class="row products_bar_row">
					<div class="col">
					    <div class="container">
					        <!-- something can go here-->
						<!--<center>-->
						<!--    <h5>Click the button below to login or sign up if you have not done so</h5>-->
						<!--    <a href="membership/registration.php" class="btn btn-outline-secondary">Sign up</a>-->
						<!--	<a href="membership/login.php" class="btn btn-outline-success">Sign in</a>-->
						<!--</center>-->
						</div>
					</div>
				</div>

		<!-- Product -->

		<div class="product">
			<div class="container">
				<div class="row">
	
					<?php 
						require_once 'db.php';

						$name = $_GET['pname'];
						$new_name = str_replace("_", " ", $name);
						//echo $new_name; 

						$sql = "SELECT * FROM `product_description` WHERE `nameProduct`= '$new_name'"; 
			  			$res = mysqli_query($con, $sql);

					  	if(mysqli_num_rows($res) > 0)  
					  	{   
						    while($fetch = mysqli_fetch_array($res)) {
						       $name = $fetch["nameProduct"];
						       $price = $fetch["priceProduct"];
						       $desc = $fetch["descProduct"];
						       $upper = $fetch["upper"];
						       $insole = $fetch["insole"];
						       $outsole = $fetch["outsole"];
						       $s = ucfirst($name);
						       $bar = ucwords(strtolower($s));
						       $data = preg_replace('/\s+/', '', $bar);

							// Product Image -->

						       echo '<div class="col-lg-6">
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
								    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								  </ol>
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								      <img class="d-block w-100" src="images/'.$data.'.jpg" alt="Birk Slippers">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="images/'.$data.'1.jpg" alt="Birk Slippers">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="images/'.$data.'2.jpg" alt="Birk Slippers">
								    </div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								    <span class="carousel-control-next-icon" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>
									</div>';
						    }
						}
					?>
					

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $new_name; ?></div>
							<div class="product_price">¢<?php echo $price; ?></div>
							<div class="product_size">
								<div class="product_size_title">Select Size <span style="color:red;">* NB: make sure to select your size to avoid selecting the default size 36</span></div>
								<form>
								<div class="form-group">
								    <select class="form-control size" id="exampleFormControlSelect1">
								      <option>36</option>
								      <option>37</option>
								      <option>38</option>
								      <option>39</option>
								      <option>40</option>
								      <option>41</option>
								      <option>42</option>
								      <option>43</option>
								      <option>44</option>
								      <option>45</option>
								    </select>
								  </div>
								</form>
							</div>
							<div class="product_text" style="text-align: left;">
							    <strong style="color: black;"><em>Product Description</em></strong><br>
								<p><?php echo $desc;  ?></p><br>
								<p><strong style="color: black;">Upper-Leather: </strong><?php echo $upper;  ?></p><br>
								<p><strong style="color: black;">Footbed (Insole): </strong><?php echo $insole;  ?></p><br>
								<p><strong style="color: black;">Outsole (foundation): </strong><?php echo $outsole;  ?></p><br>
							</div><br>
							<!--<div class="product_buttons">-->
							<!--	<div class="text-right d-flex flex-row align-items-start justify-content-start">-->
							<!--		<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">-->
							<!--			<div><div><a href="category.php"><img src="images/shop.svg" class="svg" alt=""></a></div></div>-->
							<!--		</div>-->

									<?php
									require_once 'db.php';

										if(ISSET($_SESSION['user'])){
											$user = $_SESSION['user'];
											$sql = "SELECT * FROM `users` WHERE `id` = '$user'";
											$result = mysqli_query($con, $sql);
											

												while ($fetch = mysqli_fetch_array($result)) {
												    echo'<a type="button" class="btn btn-success product_cart" role="button" style="width: 100%; color: #ffffff; font-size: 25px;" data-id5="'.$fetch['id'].'">Buy Now</a>';
												// echo '<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" data-id5="'.$fetch['id'].'">
												
												// <b class="text-decoration: none; color: green; font-size: 30;">Buy Now</b>
												// </div>';
												}
												
										}else{
										    $currentpage = urlencode($_SERVER['REQUEST_URI']);
										    echo'<a href="cart.php?location='.$currentpage.'" type="button" class="btn btn-success" role="button" style="width: 100%; color: #ffffff; font-size: 25px;">Buy Now</a>';
										    
								// 			echo'<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
								// 					<b class="text-decoration: none; color: green; font-size: 30;">Buy Now</b>
								// 				</div>';

										}
									?>
										
									
							<!--	</div>-->
							<!--</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Boxes -->
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
						<!--<div class="col-lg-4 footer_col">-->
						<!--	<div class="footer_menu">-->
						<!--		<div class="footer_title">Support</div>-->
						<!--		<ul class="footer_list">-->
						<!--			<li>-->
						<!--				<a href="#"><div>Customer Service<div class="footer_tag_1">online now</div></div></a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#"><div>Return Policy</div></a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#"><div>Terms and Conditions</div></a>-->
						<!--			</li>-->
						<!--			<li>-->
						<!--				<a href="#"><div>Contact</div></a>-->
						<!--			</li>-->
						<!--		</ul>-->
						<!--	</div>-->
						<!--</div>-->

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
							<div class="footer_contact">
								
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#" target="_blank">TomusBirk.co</a>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="js/product.js"></script>
<script src="js/owl-boxes.js"></script>
<script src="js/script.js"></script>
<script src="sweetalert/sweetalert.min.js"></script>
</body>
</html>
