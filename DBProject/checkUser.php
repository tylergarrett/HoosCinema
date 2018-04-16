<?php
    require_once('./library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     // Check connection
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }

    $query=mysqli_query($con,"SELECT * FROM website_users WHERE username='$_POST[usernameBox]' && password='$_POST[passwordBox]'");
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);

    if ($count==1)
    {
        session_start();
        $_SESSION['username'] = $_POST['usernameBox'];
        $_SESSION['password'] = $_POST['passwordBox'];
        echo "Success";
        header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/index.html");
	exit();
	}
    else
    {
        echo "Invalid username or password";
        }   

    mysqli_close($con);
    ?>
