<?php
        session_start();
        $_SESSION['searchValDirector'] = $_GET['searchDirector'];
        require_once('./library.php');
        $db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        // Check connection
        if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
           return null;
        }
        $stmt = $db->stmt_init();
        
        if($stmt->prepare("SELECT * FROM directors WHERE lastName LIKE ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchDirector'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($director_id, $firstName, $lastName, $title);
                echo "<table border=1><th>Director ID</th><th>First Name</th><th>Last Name</th><th>Title</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$director_id</td><td>$firstName</td><td>$lastName</td><td>$title</td></tr>";
                }
                echo "</table>";
        
                $stmt->close();
        }
        
        $db->close();


?>