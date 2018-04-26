<?php
        session_start();
        $_SESSION['searchVal'] = $_GET['searchMovie'];
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT title, rating, run_time, release_year FROM Movies WHERE title LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovie'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($title, $rating, $run_time, $release_year);
                echo "<table border=1><th>Title</th><th>Rating</th><th>Run Time</th><th>Release Year</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>