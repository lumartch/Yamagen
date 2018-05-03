<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();
	if(!$conn){
		echo 'Conexion no establecida'. mysql_error();
	}
	$select = "SELECT * FROM USUARIO WHERE id_tipo_usuario = 2";
	$resultado = mysqli_query($conn, $select);
	$i = 1;

	while($row = mysqli_fetch_assoc($resultado)) {

		$id_usuario = $row["id"];
		$id_academico = $row["id_academico"];
		$username = $row["username"];

		$selectAC = "SELECT * FROM ACADEMICO WHERE id = '$id_academico'";
		$resAC = mysqli_query($conn, $selectAC);
		$rowAC = mysqli_fetch_assoc($resAC);

		$user = $row['username'];
		$fotografia = $rowAC["fotografia"];
		$nombre= $rowAC["nombre"];
		$apellidos = $rowAC["apellidos"];
		$email = $rowAC["email"];
		$gradoEstudios = $rowAC["gradoEstudios"];
		$centroUniAct = $rowAC["centroUniAct"];
		$clave = $rowAC["clave"];
		$password = $row["password"];

		/*$conection = mysqli_connect('localhost', 'root', '', 'Yamagen');
		if(!$conection){
			echo 'Conexion no establecida'. mysql_error();
		}
		$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$user'";
		$res = mysqli_query($conection, $sel);
		mysqli_close($conection);*/

		echo "
			<table>
				<tr>
					<th>Foto</th>
					<th>Username</th>
					<th>Contraseña</th>
				</tr>
				<tr>
					<th></th>
					<th><input id='username".$i."' name='username".$i."' type='text' value='$user' disabled></input></th>
					<th><input id='password".$i."' name='password".$i."' type='text' value='$password'></input></th>
					<input id='id_usuario".$i."' name='id_usuario".$i."' value='$id_usuario' type='hidden'></input>
					<input id='id_academico".$i."' name='id_academico".$i."' value='$id_academico' type='hidden'></input>
					<input id='username".$i."' name='username".$i."' value='$username' type='hidden'></input>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Email</th>
				</tr>
				<tr>
					<th><input id='email".$i."' name='email".$i."' type='text' value='$email'></input></th>
					<th><input id='nombre".$i."' name='nombre".$i."' type='text' value='$nombre'></input></th>
					<th><input id='apellidos".$i."' name='apellidos".$i."' type='text' value='$apellidos'></input></th>
				</tr>
				<tr>
					<th>Grado de estudios</th>
					<th>Centro universitario</th>
					<th>Clave única de maestro</th>
				</tr>
				<tr>
					<th><input id='gradoEstudios".$i."' name='gradoEstudios".$i."' type='text' value='$gradoEstudios'></input></th>
					<th><input id='centroUniAct".$i."' name='centroUniAct".$i."' type='text' value='$centroUniAct'></input></th>
					<th><input id='clave".$i."' name='clave".$i."' type='text' value='$clave'></input></th>
				</tr>
				<tr>
					<th>Líneas Inv.</th>
				</tr>
				<tr>
					<th>";
			    	/*while($rw = mysqli_fetch_assoc($res)){
			    		echo "".$rw["lin_inves"]. "<br/>";
			    	}*/

		echo "	</th>
	    		</tr>

					<td><button id=\"mod'.$i.'\" type=\"button\" name=\"mod'.$i.'\" onclick='modificarDatos(
					    id_academico".$i.".value,
					    id_usuario".$i.".value,
					    password".$i.".value,
					    nombre".$i.".value,
					    apellidos".$i.".value,
					    email".$i.".value,
					    gradoEstudios".$i.".value,
					    centroUniAct".$i.".value,
					    clave".$i.".value,
					    username".$i.".value)'>Modificar</button></td>

					<td><button id=\"eliminar'.$i.'\" type=\"button\" name=\"eliminar'.$i.'\" onclick='eliminarDatos(
					    username".$i.".value,
					    id_usuario".$i.".value,
					    )'>Eliminar</button></td>
					
				</tr>
			</table>
			<br/>";
		$i++;
    }
	mysqli_close($conn);
?>