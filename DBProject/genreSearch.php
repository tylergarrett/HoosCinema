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
        
        if($stmt->prepare("SELECT name, title, rating, run_time, release_year FROM genre NATURAL JOIN Movies WHERE name LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchGenre'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($name, $title, $rating, $run_time, $release_year);
                echo "<table border=1><th>Genre</th><th>Title</th><th>Rating</th><th>Run Time</th><th>Release Year</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$name</td><td>$title</td><td>$rating</td><td>$run_time</td><td>$release_year</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>