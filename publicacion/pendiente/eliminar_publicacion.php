<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$admin = new Tipo_Usuario;
	$info = $_POST['boton'];
	$jsonInfo = json_encode(explode("_", $info));
	$jsonInfo = json_decode($jsonInfo);

	$admin->admin->eliminarPublicacion($jsonInfo[3], $jsonInfo[2], $jsonInfo[1], $jsonInfo[0]);

	echo '<script type="text/javascript">
        	window.location.href="/index.html";
    		$("#contInfo").load("/publicacion/pendiente/pub_pendientes.html");
        	alert("Publicación aceptada.");
        </script>';
?>