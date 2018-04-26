<?php
session_start();
unset($_SESSION['loginerror']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['loggedin']);
header('Location: http://plato.cs.virginia.edu/~tjg3ea/DBProject/login.php');
exit();
?>