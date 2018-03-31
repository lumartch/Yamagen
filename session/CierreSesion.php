<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/login.php");
	$aux = new Login();
	$aux->logout();
?>