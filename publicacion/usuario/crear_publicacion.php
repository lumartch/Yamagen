<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$publicacion = $_POST['publicacion'];
	$nombrePub = $_POST['nombre'];
	$usr = new Tipo_Usuario;
	$usr->usr->crearPublicacion($publicacion, $nombrePub);
?>