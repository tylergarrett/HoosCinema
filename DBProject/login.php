<?php
session_start();
if (!empty($_SESSION['loginerror'])) {
	$message = "Incorrect username or password!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	unset($_SESSION['loginerror']);
}
?>

<!--				ORIGINAL CODE
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

-->

<!--		Bootstrapped Code - used as a template! -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Log In to HOOS Cinema!</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="checkUser.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in!</h1>
      <label for="inputEmail" class="sr-only">Username</label>

    <!-- Check for new user creation -->  
  	<?php if ($_SESSION['newAcc'] == true) {
  	$acc = $_SESSION['loginUser'];
	echo '<input id="inputEmail" class="form-control" placeholder="Username" required autofocus name="usernameBox" value="'.$acc.'">';
	unset($_SESSION['newAcc']);
	} else {
		echo '<input id="inputEmail" class="form-control" placeholder="Username" required autofocus name="usernameBox">';
	}
	?>
      <!--<input id="inputEmail" class="form-control" placeholder="Username" required autofocus name="usernameBox"> -->

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="passwordBox">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br>
      <p>Click <a href="register.html">here</a> to sign up!</p>
    </form>
  </body>
</html>