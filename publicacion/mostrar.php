<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$id_pub = $_POST["id"];
	$tipo = $_POST["tipo"];
	$user = new Usr;
	$user->mostrarPublicacion($tipo, $id_pub);
?>