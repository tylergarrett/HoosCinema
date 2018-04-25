<?php
        session_start();
        $_SESSION['searchValGenre'] = $_GET['searchGenre'];
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM genre NATURAL JOIN Movies WHERE name LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchGenre'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($genre_id, $name, $movie_id, $title, $rating, $run_time, $release_year, $director_id);
                echo "<table border=1><th>Genre ID</th><th>Genre</th><th>Movie ID</th><th>Title</th><th>Rating</th><th>Run Time</th><th>Release Year</th><th>Director ID</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$genre_id</td><td>$name</td><td>$movie_id</td><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td><td>$director_id</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>