<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/linea_investigacion.php");
	$aux = new Linea_Investigacion;
	echo $aux->autocomplementar();
?>