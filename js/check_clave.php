<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();

	if(isset($_POST['clave'])){
		$clave = $_POST['clave'];
		if(!empty($clave)){
			$select = "SELECT clave FROM ACADEMICO WHERE clave = '$clave'";
			$resultado = mysqli_query($conn, $select);
			if(mysqli_num_rows($resultado) == 0){
				echo "Disponible";
			}
			else if(mysqli_num_rows($resultado) == 1){
				echo "No disponible";
			}
		}
	}
	mysqli_close($conn);
?>