<?php 
session_start();

#Database connenction goes here
// $db = mysqli_connect('localhost', 'root', '', 'register');
require('../db.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

	#receive all input values from the form
	$redirect = NULL;
    if($_POST['location1'] != '') {
        $redirect = $_POST['location1'];
    }
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$password = md5($password);

#validate email address
#

#check if user input is empty
if (empty($email) || empty($password)) {
    // error url for empty field
    $url = 'login.php?log=field_required';
    // if we have a redirect URL, pass it back to login.php so we don't forget it
    if(isset($redirect)) {
        $url .= '&location1=' . urlencode($redirect);
    }

  header("Location: " . $url);
   exit();

}

	#check database to find out if the username and the password entered match any account
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);

	#provided the result user entered exist log the user in
	if($count == 1) {

		//echo("Error description: " . mysqli_error($db));
// 		set cookie for email and password
// 		if(!empty($_POST["remember"])) {
		    
// 			setcookie ("email",$email,time()+(30 * 24 * 60 * 60));
// 			setcookie ("password",$password,time()+(30 * 24 * 60 * 60));
// 		} 

    $_SESSION['username'] = $row['username'];
  	$_SESSION['user'] = $row['id'];
  	#after assigning session to user relocate the user to the destination page or check if ther is a redirect page
  	
  	if($redirect) {
        header("Location:". $redirect);
    } else {
        header("Location:../index.php");
    }
    exit();

    }else {
         // error url for non user
        $url = 'login.php?log=user_unexist';
        // if we have a redirect URL, pass it back to login.php so we don't forget it
        if(isset($redirect)) {
            $url .= '&location1=' . urlencode($redirect);
        }
    
        header("Location: " . $url);
        exit();
      	
    }


}

?>