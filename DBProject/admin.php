<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php');
	unset($_SESSION['loggedin']);
	exit();
} 
if ($_SESSION['username'] != 'admin') {
	header('Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php');
	exit();
} else {
	# Do Nothing - load page
}

?>

<html>
<head>
	<!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet"> 

    <!-- JavaScript libraries -->
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

	<!-- Formatting -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<title>Admin Page</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">HOOSCinema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
</nav>

    <main role="main" class="container">
<center><h1>Insert into Movies</h1></center>
<form action="movieInsert.php" method="post">
	Movie ID: <input type="number" name="id">
	Title: <input type="text" name="title">
	Rating: <input type="text" name="rating">
	Runtime: <input type="number" name="runtime">
	Release Year: <input type="number" name="release_year">
	Director ID: <input type="number" name="director">
	Genre ID: <input type="number" name="genre">

<input type="Submit">
</form>
<center><h1>Delete from Movies</h1>
<form action="movieDelete.php" method="post">
	Movie Title: <input type="text" name="deleteTitle">
	<input type="Submit">
</form></center>
    </main>

</body>
</html>