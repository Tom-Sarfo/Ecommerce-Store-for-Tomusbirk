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

	<title>Sign In To TomusBirk To Start Shopping </title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/favicon-tomusbirk.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" action="login_query.php" method="POST">
				    <?php
                        echo '<input type="hidden" name="location1" value="';
                        if(isset($_GET['location1'])) {
                            echo htmlspecialchars($_GET['location1']);
                        }
                        echo '" />';
				    
				    ?>
					<span>
						<?php 

							if (!isset($_GET['log'])) {
								// exit();
								//echo "cool";
								
							}elseif ($_GET['log'] == 'user_unexist') {
								echo "<p id='error'>Your email and Password combination does not match *</p>";
							}elseif ($_GET['log'] == 'field_required') {
								echo "<p id='error'>all fields are required *</p>";
							}

						?>
					</span>
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; }?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
<!-- remember will go here -->
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div><br>

					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or click Sign Up if you dont have an account
						</span>

						<div class="container-login100-form-btn p-t-25">
						    <?php
						    echo '<a  href="registration.php?location1='.urlencode($_GET['location1']).'" class="btn btn-primary">';
						       echo 'SIGN UP';
						    echo '</a>';
						    ?>
					</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>