<?php
        session_start();
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM test") or die(mysqli_error($db))) {
                //$searchString = '%' . $_GET['searchGenre'] . '%';
                //$stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($title);
                echo "<table border=1><th>Title</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$title</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>