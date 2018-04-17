<?php
session_start();
if (!empty($_SESSION['loginerror'])) {
	$message = "Incorrect username or password!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	unset($_SESSION['loginerror']);
}

if ($_SESSION['newAcc'] == true) {
	echo "Sign in with your new account!";
	unset($_SESSION['newAcc']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Log In to HOOS Cinema!</title>
</head>
<body>
	<h1>Log In</h1>
	<center>
    <form action="checkUser.php" method="post">
    Username: <input type="text" name="usernameBox" placeholder="Username">
	Password: <input type="password" name="passwordBox" placeholder="Password">
	<input type="Submit">
	</form>
    <p>Don't have an account? Click <a href="register.html">Here</a> to sign up!</p>
    
	</center>
</body>
</html>