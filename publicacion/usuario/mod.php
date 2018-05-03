<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$id_pub = $_GET['info'];
	$tipo = $_GET['tipo'];

	$usr = new Tipo_Usuario;
	$usr->usr->editarPublicacion($tipo, $id_pub);
?>
