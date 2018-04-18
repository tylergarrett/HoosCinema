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
	<link href="bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
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


</body>
</html>