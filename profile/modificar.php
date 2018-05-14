<?php
    include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$id_usuario = $_POST["id_usuario"];
    $id_academico = $_POST["id_academico"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $centroUniversitario = $_POST["centroUniAct"];
    $grado_estudios = $_POST["gradoEstudios"];
    $clave = $_POST["clave"];
	$admin->modificarUsuario($id_usuario, $password);
	$admin->modificarAcademico($id_academico, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave);
?>
