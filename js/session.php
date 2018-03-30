<?php
	session_start();
	if($_SESSION['isLogged'] == false){
		echo "false";
	}else{
		echo "true";
	}
?>