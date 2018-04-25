<?php
session_start();
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   $sql="DELETE FROM directors WHERE lastName = '" . $_POST['d_name'] . "'";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   //echo "1 record added"; // Output to user
   header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/admin.php");  
   mysqli_close($con);
?>