<?php
 session_start();
 include_once("./library.php"); // To connect to the database
 $USERNAME = 'CS4750mhh5rec';
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO website_users (username, password)
 VALUES
 ('$_POST[username2]','$_POST[password2]')";

 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "1 record added"; // Output to user
 $_SESSION['newAcc'] = true;
 $_SESSION['loginUser'] = $_POST['username2'];
 header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php");
 mysqli_close($con);
 ?>
