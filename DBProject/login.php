<?php
session_start();
if (!empty($_SESSION['loginerror'])) {
	$message = "Incorrect username or password!";
	echo "<script type='text/javascript'>alert('$message');</script>";
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
    <h1>Create New User</h1>
    <form action="createUser.php" method="post">
	Username: <input type="text" name="username2" placeholder="Username">
	Password: <input type="password" name="password2" placeholder="Password">
	<input type="Submit">
	</form>
	</center>
</body>
</html>