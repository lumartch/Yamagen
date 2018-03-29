<?php
	include "tipo_usuario.php";
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$centroUniversitario = $_POST['centroUniv'];
	$grado_estudios = $_POST['gradoEstudios'];
	$clave = $_POST['clave'];
	
	$usuario = new Usuario;
	$usuario->crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave);
	$tipo_usuario = new Tipo_Usuario;
	$tipo_usuario->admin->crearUsuario($usuario);
?>