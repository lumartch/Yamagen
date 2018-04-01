<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
	if(!$conn){
		echo 'Conexion no establecida'. mysql_error();
	}
	$select = "SELECT username, nombre, apellidos, email, centroUniAct, gradoEstudios, clave FROM USUARIO WHERE id_tipo_usuario = 2";
	$resultado = mysqli_query($conn, $select);
	mysqli_close($conn);
	
	while($row = mysqli_fetch_assoc($resultado)) {
		
		$user = $row['username'];
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
		$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$user'";
		$res = mysqli_query($conection, $sel);
		mysqli_close($conection);

		echo "
		<form id='eliminar' name='eliminar' action='/usuario/eliminar_usuario.php' method='post'></form>
		<form id='modificar' name='modificar' action='/usuario/modificar_usuario.php' method='post'></form>
		<table>
			<tr>
				<th>Foto</th>
				<th>Username</th>
				<th>Nombre</th>
				<th>Apellidos</th>
			</tr>
			<tr>
				<th></th>
				<th><input id='username' name='username' type='text' value='$user' disabled></input></th>
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
    	echo '</th>
    		</tr>

			<tr>
				<th><button type="submit" form="eliminar" >Modificar</th>
				<th><button type="submit" form="modificar" >Eliminar</th>
			</tr>
		</table><br/>';
    }
?>