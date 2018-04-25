<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');

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