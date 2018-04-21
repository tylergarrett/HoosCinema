<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php');
	unset($_SESSION['loggedin']);
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

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<title>HOOS Cinema</title>
	<script>
	$(document).ready(function() {
		$( "#movieInput" ).change(function() {
		
			$.ajax({
				url: 'searchMovies.php', 
				data: {searchMovie: $( "#movieInput" ).val()},
				success: function(data){
					$('#MovieResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
</head>
<body>
	<h3>Search Movies!</h3>	
           
	<input class="xlarge" id="movieInput" type="search" size="30" placeholder="Movie Title Contains"/>

	<div id="MovieResult">Search Result</div>

	<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>


<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">HOOSCinema</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
</nav>

    <main role="main" class="container">

    </main>

</body>
</html>