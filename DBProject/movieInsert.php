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
   $sql="INSERT INTO Movies (movie_id, title, rating, run_time, release_year, director_id, genre_id)
   VALUES
   ('$_POST[id]','$_POST[title]','$_POST[rating]','$_POST[runtime]','$_POST[release_year]','$_POST[director]', '$_POST[genre]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   //echo "1 record added"; // Output to user
   header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/admin.php");  
   mysqli_close($con);
?>