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
   $sql="INSERT INTO directors (director_id, firstName, lastName, title)
   VALUES
   ('$_POST[d_id]','$_POST[firstName]','$_POST[lastName]','$_POST[d_title]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   //echo "1 record added"; // Output to user
   header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/admin.php");  
   mysqli_close($con);
?>