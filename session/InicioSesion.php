<?php
	include "login.php";
	$usr = $_POST['usrName'];
	$passwd = $_POST['passwd'];
	$aux = new Login();
	$aux->login($usr, $passwd);
?>