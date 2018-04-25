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
 	<!-- Movie Search -->
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
	<!-- Search release year -->
	<script>
	$(document).ready(function() {
		$( "#movieInput2" ).change(function() {
		
			$.ajax({
				url: 'releaseYearSearch.php', 
				data: {searchYear: $( "#movieInput2" ).val()},
				success: function(data){
					$('#yearResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
	<!-- Search stars -->
	<script>
	$(document).ready(function() {
		$( "#movieInput3" ).change(function() {
		
			$.ajax({
				url: 'starSearch.php', 
				data: {searchStar: $( "#movieInput3" ).val()},
				success: function(data){
					$('#starResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
	<!-- Search directors -->
	<script>
	$(document).ready(function() {
		$( "#movieInput4" ).change(function() {
		
			$.ajax({
				url: 'directorSearch.php', 
				data: {searchDirector: $( "#movieInput4" ).val()},
				success: function(data){
					$('#directorResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
	<!-- Search genre -->
	<script>
	$(document).ready(function() {
		$( "#movieInput5" ).change(function() {
		
			$.ajax({
				url: 'genreSearch.php', 
				data: {searchGenre: $( "#movieInput5" ).val()},
				success: function(data){
					$('#genreResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
	</script>
	<!-- Search current movies -->
	<script>
	$(document).ready(function() {
		$( "#viewSubmit" ).click(function() {
		
			$.ajax({
				url: 'currentSearch.php', 
				data: {searchCurrent: $( "#viewSubmit" ).val()},
				success: function(data){
					$('#CurrentResult').html(data);	
				
				}
			});
		});
		
	});
	</script>
</head>
<body>
	<!-- Search by current -->
	<center>
	<h3>See What Movies Are Currently Playing!</h3>	

	<form>
     <input id ="viewSubmit" name="viewSubmit" class="btn btn-success" value="See Current Movies!" readonly/>
     <div id="CurrentResult"></div>
    </form>
	</center>
	<br>

	<!-- Search by movie title -->
	<center>
	<h3>Search Movies!</h3>	
           
	<input class="xlarge" id="movieInput" type="search" size="30" placeholder="Movie Title Contains"/>

	<div id="MovieResult">Search Result</div>

	<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
	</center>

	<!-- Search by release year -->
	<br>
	<center>
	<h3>Search Movies by Release Year!</h3>	
           
	<input class="xlarge" id="movieInput2" type="search" size="30" placeholder="Release Year Greater Than or Equal To"/>

	<div id="yearResult">Search Result</div>

	<form method="post" action="exportReleaseYear.php">
     <input type="submit" name="exportReleaseYear" class="btn btn-success" value="Export" />
    </form>
	</center>

	<!-- Search by stars -->
	<br>
	<center>
	<h3>Search Movies by Rating!</h3>	
           
	<input class="xlarge" id="movieInput3" type="search" size="30" placeholder="Search for 1-5 Star Ratings"/>

	<div id="starResult">Search Result</div>

	<form method="post" action="exportRatings.php">
     <input type="submit" name="exportRatings" class="btn btn-success" value="Export" />
    </form>
	</center>

	<!-- Search by director -->
	<br>
	<center>
	<h3>Search Movies by Director (Last Name)!</h3>	
           
	<input class="xlarge" id="movieInput4" type="search" size="30" placeholder="Search Directors by Last Name"/>

	<div id="directorResult">Search Result</div>

	<form method="post" action="exportDirectors.php">
     <input type="submit" name="exportDirectors" class="btn btn-success" value="Export" />
    </form>
	</center>

		<!-- Search by genre -->
	<br>
	<center>
	<h3>Search Movies by Genre!</h3>	
           
	<input class="xlarge" id="movieInput5" type="search" size="30" placeholder="Search by Genre"/>

	<div id="genreResult">Search Result</div>

	<form method="post" action="exportGenre.php">
     <input type="submit" name="exportGenre" class="btn btn-success" value="Export" />
    </form>
	</center>


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