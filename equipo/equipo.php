<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
	if(!$conn){
		echo 'Conexion no establecida'. mysql_error();
	}
	$select = "SELECT nombre, apellidos, email, centroUniAct, gradoEstudios, clave FROM USUARIO";
	$resultado = mysqli_query($conn, $select);
	mysqli_close($conn);
	while($row = mysqli_fetch_assoc($resultado)) {
		echo "<tr><th></th><th>".$row["nombre"]."</th><th>".$row["apellidos"]."</th><th>".$row["email"]."</th><th>".$row["gradoEstudios"]."</th><th>".$row["centroUniAct"]."</th><th>".$row["clave"]."</th></tr>";
    }
?>