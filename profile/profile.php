<?php
	session_start();

	$username = $_SESSION['username'];

	$conn = mysqli_connect("localhost", "root", "", "Yamagen");
	if(!$conn){
		echo "Conexion fallida";
		return;
	}

	$select = "SELECT * FROM USUARIO WHERE username = '$username'";
	$resultado = mysqli_query($conn, $select);

	while($row = mysqli_fetch_assoc($resultado)) {
		
		$nombre= $row["nombre"];
		$apellidos = $row["apellidos"];
		$email = $row["email"];
		$gradoEstudios = $row["gradoEstudios"];
		$centroUniAct = $row["centroUniAct"];
		$clave = $row["clave"];

		$conection = mysqli_connect('localhost', 'root', '', 'Yamagen');
		if(!$conection){
			echo 'Conexion no establecida'. mysql_error();
		}
		$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$username'";
		$res = mysqli_query($conection, $sel);
		mysqli_close($conection);

		echo "
		<form id='modificar' name='modificar' action='/profile/modificar.php' method='post'>
			<table>
				<tr>
					<th>Foto</th>
					<th>Username</th>
					<th>Nombre</th>
					<th>Apellidos</th>
				</tr>
				<tr>
					<th></th>
					<th><input id='username' name='username' type='text' value='$username' disabled></input></th>
					<th><input id='nombre' name='nombre' type='text' value='$nombre'></input></th>
					<th><input id='apellidos' name='apellidos' type='text' value='$apellidos'></input></th>
				</tr>
				<tr>
					<th>Email</th>
					<th>Grado de estudios</th>
					<th>Centro universitario</th>
					<th>Clave única de maestro</th>
				</tr>
				<tr>
					<th><input id='email' name='email' type='text' value='$email'></input></th>
					<th><input id='gradoEstudios' name='gradoEstudios' type='text' value=$gradoEstudios></input></th>
					<th><input id='centroUniAct' name='centroUniAct' type='text' value='$centroUniAct'></input></th>
					<th><input id='clave' name='clave' type='text' value='$clave'></input></th>
				</tr>

				<tr>
					<th>Líneas Inv.</th>
				</tr>
				<tr>
					<th>";
			    	while($rw = mysqli_fetch_assoc($res)){
			    		echo "".$rw["lin_inves"]. "<br/>";
			    	}
	    	

	    	echo '
	    			</th>
	    		</tr>

				<tr>
					<th><button type="submit" form="modificar" >Modificar</th>
				</tr>
			</table>
		</form>';
    }
?>