<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
	if(!$conn){
		echo 'Conexion no establecida'. mysql_error();
	}
	$select = "SELECT * FROM USUARIO WHERE id_tipo_usuario = 2";
	$resultado = mysqli_query($conn, $select);
	mysqli_close($conn);
	$i = 1;

	while($row = mysqli_fetch_assoc($resultado)) {
		
		$user = $row['username'];
		$nombre= $row["nombre"];
		$apellidos = $row["apellidos"];
		$email = $row["email"];
		$gradoEstudios = $row["gradoEstudios"];
		$centroUniAct = $row["centroUniAct"];
		$clave = $row["clave"];
		$password = $row["password"];

		$conection = mysqli_connect('localhost', 'root', '', 'Yamagen');
		if(!$conection){
			echo 'Conexion no establecida'. mysql_error();
		}
		$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$user'";
		$res = mysqli_query($conection, $sel);
		mysqli_close($conection);

		echo "
			<table>
				<tr>
					<th>Username</th>
					<th>Contraseña</th>
					<th>Nombre</th>
					<th>Apellidos</th>
				</tr>
				<tr>
					<th><input id='username".$i."' name='username".$i."' type='text' value='$user' disabled></input></th>
					<th><input id='password".$i."' name='password".$i."' type='text' value='$password'></input></th>
					<th><input id='nombre".$i."' name='nombre".$i."' type='text' value='$nombre'></input></th>
					<th><input id='apellidos".$i."' name='apellidos".$i."' type='text' value='$apellidos'></input></th>
				<tr>
					<th>Email</th>
					<th>Grado de estudios</th>
					<th>Centro universitario</th>
					<th>Clave única de maestro</th>
				</tr>
				<tr>
					<th><input id='email".$i."' name='email".$i."' type='text' value='$email'></input></th>
					<th><input id='gradoEstudios".$i."' name='gradoEstudios".$i."' type='text' value='$gradoEstudios'></input></th>
					<th><input id='centroUniAct".$i."' name='centroUniAct".$i."' type='text' value='$centroUniAct'></input></th>
					<th><input id='clave".$i."' name='clave".$i."' type='text' value='$clave'></input></th>
				</tr>

				<tr>
					<th>Líneas Inv.</th>
				</tr>
				<tr>
					<th>";
			    	while($rw = mysqli_fetch_assoc($res)){
			    		echo "".$rw["lin_inves"]. "<br/>";
			    	}

		echo "	</th>
	    		</tr>

					<td><button id=\"mod'.$i.'\" type=\"button\" name=\"mod'.$i.'\" onclick='modificarDatos(
					    username".$i.".value,
					    password".$i.".value,
					    nombre".$i.".value,
					    apellidos".$i.".value,
					    email".$i.".value,
					    gradoEstudios".$i.".value,
					    centroUniAct".$i.".value,
					    clave".$i.".value)'>Modificar</button></td>

					<td><button id=\"eliminar'.$i.'\" type=\"button\" name=\"eliminar'.$i.'\" onclick='eliminarDatos(
					    username".$i.".value)'>Eliminar</button></td>
					
				</tr>
			</table>
			<br/>";
		$i++;
    }
?>