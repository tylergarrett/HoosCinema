<?php
        session_start();
        $_SESSION['searchValYear'] = $_GET['searchYear'];
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM Movies WHERE release_year >= " . $_GET['searchYear'] . "") or die(mysqli_error($db))) {
                //$searchString = '%' . $_GET['searchYear'] . '%';
                //$stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($movie_id, $title, $rating, $run_time, $release_year, $director_id, $genre_id);
                echo "<table border=1><th>Movie ID</th><th>Title</th><th>Rating</th><th>Run Time</th><th>Release Year</th><th>Director ID</th><th>Genre ID</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$movie_id</td><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td><td>$director_id</td><td>$genre_id</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>