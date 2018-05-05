<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$id_usuario = $_POST['id_usuario'];
	$admin->eliminarUsuario($id_usuario);
?>