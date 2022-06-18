<?php 
session_start();

#Database connenction goes here
// $db = mysqli_connect('localhost', 'root', '', 'register');
require('../db.php');

#Registering user whenn the singup button is click
if($_SERVER["REQUEST_METHOD"] == "POST") {

  #receive all input values from the form
  $redirect = NULL;
    if($_POST['location1'] != '') {
        $redirect = $_POST['location1'];
    }
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

if (empty($username) || empty($email) || empty($password_1) || empty($password_2)) {
    
    // error url for empty field
    $url = 'registration.php?signup=fill_all_forms';
    // if we have a redirect URL, pass it back to login.php so we don't forget it
    if(isset($redirect)) {
        $url .= '&location1=' . urlencode($redirect);
    }

    header("Location: " . $url);
    exit();
}

// Server side email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    // error invalid email address
    $url = 'registration.php?signup=invalid_email';
    // if we have a redirect URL, pass it back to login.php so we don't forget it
    if(isset($redirect)) {
        $url .= '&location1=' . urlencode($redirect);
    }

    header("Location: " . $url);
    exit();
}


# check database to see if user exist with the same username or email
	$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$user = mysqli_fetch_assoc($result);

# check to see if the two password user typed in match
if ($password_1 != $password_2) {
    
    // error unmactched password
    $url = 'registration.php?signup=unmatched_password';
    // if we have a redirect URL, pass it back to login.php so we don't forget it
    if(isset($redirect)) {
        $url .= '&location1=' . urlencode($redirect);
    }

    header("Location: " . $url);
    exit();

# if user does exist then send an error message to the page 

}elseif ($user) {

	if ($user['email'] === $email) {
	    
    	 // error email already exist
        $url = 'registration.php?signup=email_exist';
        // if we have a redirect URL, pass it back to login.php so we don't forget it
        if(isset($redirect)) {
            $url .= '&location1=' . urlencode($redirect);
        }
    
        header("Location: " . $url);
        exit();

    }


}else{

#encrypt the password before saving into the database
$password = md5($password_1);
    $trn_date = date("Y-m-d H:i:s");
  	$query = "INSERT INTO users (username, email, password, trn_date)
  			  VALUES('$username', '$email', '$password', '$trn_date')";
  	mysqli_query($con, $query);
#after inserting users dat send user a welcome message
    require 'PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->setFrom('welcomecustomer@tomusbirk.com', 'Christine from TomusBirk');
    $mail->addAddress($email, $username);
    $mail->Subject = 'Welcome To TomusBirk';
    $mail->isHTML(true);
    
    $mail->AddEmbeddedImage('images/SunflowerRedWhite1.jpg', 'my-logo', 'images/SunflowerGreyGreen.jpg'); // attach file logo.jpg, and later link to it using identfier logoimg
    $mail->Body = "
    <p><b>Hi! $username,</b><br>
    
    Thank you for having interest in our service. TomusBirk is here to provide you with the best of quality footwear. 
    If you have any issue concerning our service dont hesitate to send us a message</p>
    <h5>Have a qiuck veiw of our product</h5>
    <a href='https://www.tomusbirk.com' style='font-size: 35px;'>view in store</button>";
    
    $mail->AltBody = "Hello, Thank you for having interest in our service. If you have any issue concerning our service dont hesitate to send us a message";
    
    if(!$mail->send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
    
  	#log user in automatically after registering user
    $query1 = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($con, $query1);

    while ($fetch = mysqli_fetch_array($results)) {

	    if (mysqli_num_rows($results) == 1) {
	    	$_SESSION['username'] = $username;
	      	$_SESSION['user'] = $fetch['id'];
	 # if all is set send user back to the where he left off or redirect to index page
	 
	    if($redirect) {
            header("Location:". $redirect);
        } else {
            header("Location:../index.php");
        }
        exit();
        
	    }
	}

    }

}
}
?>