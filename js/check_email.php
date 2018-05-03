<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		if(!empty($email)){
			$select = "SELECT email FROM ACADEMICO WHERE email = '$email'";
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