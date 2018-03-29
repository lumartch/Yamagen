<?php 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	$_SESSION['username'] = "Hola mundo";
	echo $_SESSION['username'];
?>