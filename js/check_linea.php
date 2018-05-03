<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();
	if(isset($_POST["referencia"])){

        $term = $_POST["referencia"];

        $select = "SELECT linea FROM LINEA_INVESTIGACION WHERE linea LIKE '%$term%'";
        echo $select;
	}
	mysqli_close($conn);
?>