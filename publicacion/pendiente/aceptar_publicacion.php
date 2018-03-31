<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Tipo_Usuario;
	$info = $_POST['boton'];
	$jsonInfo = json_encode(explode("_", $info));
	$jsonInfo = json_decode($jsonInfo);

	$admin->admin->aceptarPublicacion($jsonInfo[3], $jsonInfo[2], $jsonInfo[1], $jsonInfo[0]);
?>