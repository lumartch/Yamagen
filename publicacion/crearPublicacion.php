<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$publicacion = $_POST['publicacion'];
	$lin_nombre = $_POST['lin_nombre'];
	$usr = new Tipo_Usuario;
	$usr->usr->crearPublicacion($publicacion, $lin_nombre);
?>