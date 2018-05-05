<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$admin = new Tipo_Usuario;
	$admin->admin->crearUsuario($username, $password, $nombre, $apellidos, $email);
?>