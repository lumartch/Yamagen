<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");

	$aux = new Conexion;
	$conn = $aux->conexion();

	$select = "SELECT * FROM ACADEMICO";
	$resultado = mysqli_query($conn, $select);
	
	while($row = mysqli_fetch_assoc($resultado)) {
		$id_academico = $row["id"];
		echo "<tr><th><img id='fotografia' height='50' width='50' src='".$row["fotografia"]."' class='img-rounded'></img></th><th>".$row["nombre"]."</th><th>".$row["apellidos"]."</th><th>".$row["email"]."</th><th>".$row["gradoEstudios"]."</th><th>".$row["centroUniAct"]."</th><th>".$row["clave"]."</th><th>";

		$selectLineasInvestigacion = "SELECT * FROM USR_LIN_INVES WHERE id_academico = '$id_academico'";
		$resultadoLineas =  mysqli_query($conn, $selectLineasInvestigacion);

		while($rw = mysqli_fetch_assoc($resultadoLineas)){
			$selectLinea = "SELECT * FROM LINEA_INVESTIGACION WHERE id = '".$rw["id_lin_inves"]."'";
			$resLinea = mysqli_query($conn, $selectLinea);
			$queryResult = mysqli_fetch_assoc($resLinea);
			echo $queryResult["linea"]."</br>";
		}
    	echo "</th></tr>";
    }
	mysqli_close($conn);
?>
