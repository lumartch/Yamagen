<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Admin;
	$username = $_GET['usr'];

	$admin->eliminarUsuario($username);
?>

<script type="text/javascript">
	window.location.href = "/index.html";
	$("#contInfo").load("/usuario/mostrar.html");
</script>