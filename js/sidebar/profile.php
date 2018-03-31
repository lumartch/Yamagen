<?php
	session_start();

	$username = $_SESSION['username'];

	$conn = mysqli_connect("localhost", "root", "", "Yamagen");
	if(!$conn){
		echo "Conexion fallida";
		return;
	}

	$select = "SELECT * FROM USUARIO WHERE username = '$username'";
	$query = mysqli_query($conn, $select);
?>