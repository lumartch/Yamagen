<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$id_academico = $_POST['id_academico'];
	echo $id_academico;
	$admin->eliminarAcademico($id_academico);
?>