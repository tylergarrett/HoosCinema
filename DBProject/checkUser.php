<?php
    session_start();
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
        $_SESSION['loggedin'] = true;
        //echo "Success";
        if ($_SESSION['username'] == 'admin') {
            header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/admin.php");
        } else {
            header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/index.php");
	       }   
    exit();
	}
    else
    {
        session_start();
        $_SESSION['loginerror'] = "Incorrect username or password.";
        header("Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php");
        }   

    mysqli_close($con);
    ?>
