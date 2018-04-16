<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();
        
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM Movies WHERE title LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovie'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($movie_id, $title, $rating, $run_time, $release_year, $director_id, $genre_id);
                echo "<table border=1><th>movie_id</th><th>title</th><th>rating</th><th>run_time</th><th>release_year</th><th>director_id</th><th>genre_id</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$movie_id</td><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td><td>$director_id</td><td>genre_id</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>