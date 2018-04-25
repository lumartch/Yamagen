<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;

	$id_academico = $_GET['id_ac'];
	$id_usuario = $_GET['id_usr'];
	$password = $_GET['pass'];
	$nombre = $_GET['nom'];
	$apellidos = $_GET['ape'];
	$email = $_GET['ema'];
	$centroUniversitario = $_GET['cen'];
	$grado_estudios = $_GET['gra'];
	$clave = $_GET['clav'];

	echo $id_academico;
	echo $id_usuario;
	echo $password;
	echo $nombre;
	echo $apellidos;
	echo $email;
	echo $centroUniversitario;
	echo $grado_estudios;
	echo $clave;

	//$admin->modificarUsuario($id_academico, $id_usuario, $password, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave);
?>