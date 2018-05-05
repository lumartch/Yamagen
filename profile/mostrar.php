<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
    $id_usuario = $_POST['id_usuario'];
	$id_academico = $_POST['id_academico'];
    $auxUsuario = new Usr;
	$auxUsuario->mostrarUsuario($id_usuario, $id_academico);
?>