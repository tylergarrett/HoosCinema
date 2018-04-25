<?php
session_start();
     $SERVER = 'stardock.cs.virginia.edu';
     if ($_SESSION['username'] == 'admin') {
     	$USERNAME = 'CS4750mhh5rec';				// admin is C
     }  else {
     	$USERNAME = 'CS4750mhh5reb';			// regular user is B
     }
     $PASSWORD = 'mitchell';
     $DATABASE = 'CS4750mhh5re';
?>
