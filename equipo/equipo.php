<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");

	$aux = new Conexion;
	$conn = $aux->conexion();
	if(!$conn){
		echo 'Conexion no establecida'. mysql_error();
	}
	$select = "SELECT * FROM ACADEMICO";
	$resultado = mysqli_query($conn, $select);
	mysqli_close($conn);
	
	while($row = mysqli_fetch_assoc($resultado)) {
		
		/*$user = $row['id'];
		$conection = mysqli_connect('localhost', 'root', '', 'Yamagen');
		if(!$conection){
			echo 'Conexion no establecida'. mysql_error();
		}
		$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$user'";
		$res = mysqli_query($conection, $sel);
		mysqli_close($conection);*/
		echo "<tr><th>".$row["fotografia"]."</th><th>".$row["nombre"]."</th><th>".$row["apellidos"]."</th><th>".$row["email"]."</th><th>".$row["gradoEstudios"]."</th><th>".$row["centroUniAct"]."</th><th>".$row["clave"]."</th><th>";
    	/*while($rw = mysqli_fetch_assoc($res)){
    		echo "".$rw["lin_inves"]. "<br/>";
    	}*/
    	echo "</th></tr>";
    }
?>