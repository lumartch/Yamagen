<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$id_pub = $_POST['info'];
	$tipo = $_POST['tipo'];

	$usr = new Tipo_Usuario;
	$usr->usr->editarPublicacion($tipo, $id_pub);
?>
