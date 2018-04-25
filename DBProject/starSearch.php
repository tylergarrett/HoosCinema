<?php
        session_start();
        //$_SESSION['searchVal'] = $_GET['searchMovie'];
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM Movies NATURAL JOIN user_rating WHERE stars >= " . $_GET['searchStar'] . "") or die(mysqli_error($db))) {
                //$searchString = '%' . $_GET['searchYear'] . '%';
                //$stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($movie_id, $title, $rating, $run_time, $release_year, $director_id, $genre_id, $reviewer_id, $stars);
                echo "<table border=1><th>Movie ID</th><th>Title</th><th>Rating</th><th>Run Time</th><th>Release Year</th><th>Director ID</th><th>Genre ID</th><th>Reviewer ID</th><th>Stars</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$movie_id</td><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td><td>$director_id</td><td>$genre_id</td><td>$reviewer_id</td><td>$stars</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>