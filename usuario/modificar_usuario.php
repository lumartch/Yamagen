<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;

	$id_academico = $_POST['id_academico'];
	$id_usuario = $_POST['id_usuario'];
	$password = $_POST['password'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$centroUniversitario = $_POST['centroUniAct'];
	$grado_estudios = $_POST['gradoEstudios'];
	$clave = $_POST['clave'];
	
	$admin->modificarUsuario($id_usuario, $password);
	$admin->modificarAcademicoAdmin($id_academico, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave);
?>

