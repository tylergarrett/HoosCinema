<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();
        
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM Movies WHERE title LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchMovie'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($movie_id, $title, $rating);
                echo "<table border=1><th>ID</th><th>Title</th><th>Rating</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$movie_id</td><td>$title</td><td>$rating</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>