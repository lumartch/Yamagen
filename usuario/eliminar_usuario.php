<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$id_usuario = $_GET['id_usuaro'];

	$admin->eliminarUsuario($id_usuario);
?>

<script type="text/javascript">
	window.location.href = "/index.html";
	$("#contInfo").load("/usuario/mostrar.html");
</script>