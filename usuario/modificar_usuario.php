<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$username = $_GET['usr'];
	$password = $_GET['pass'];
	/*$nombre = $_GET['nom'];
	$apellidos = $_GET['ape'];
	$email = $_GET['ema'];
	$centroUniversitario = $_GET['cen'];
	$grado_estudios = $_GET['gra'];
	$clave = $_GET['clav'];*/

	echo $username;
	echo $password;
	/*echo $nombre;
	echo $apellidos;
	echo $email;
	echo $centroUniversitario;
	echo $grado_estudios;
	echo $clave;*/
	//$admin->modificarUsuario($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave);
?>

