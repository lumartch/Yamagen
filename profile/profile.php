<?php
	session_start();

	$username = $_SESSION['username'];
	$id_usuario = $_SESSION['id_usuario'];
	$id_academico = $_SESSION['id_academico'];

	$conn = mysqli_connect("localhost", "root", "", "Yamagen");
	if(!$conn){
		echo "Conexion fallida";
		return;
	}

	$select = "SELECT * FROM USUARIO WHERE id = '$id_usuario'";
	$resultado = mysqli_query($conn, $select);
	$row = mysqli_fetch_assoc($resultado);
	
	$selectAC = "SELECT * FROM ACADEMICO WHERE id = '$id_academico'";
	$resAC = mysqli_query($conn, $selectAC);
	$rowAC = mysqli_fetch_assoc($resAC);
	mysqli_close($conn);

	$username = $row['username'];
	$fotografia = $rowAC["fotografia"];
	$nombre = $rowAC["nombre"];
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
	$sel = "SELECT lin_inves FROM USR_LIN_INVES WHERE usrname = '$username'";
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
				<th>'$fotografia'</th>
				<th><input id='username' name='username' type='text' value='$username' disabled></input></th>
				<th><input id='password' name='password' type='text' value='$password'></input></th>
				<input id='id_usuario' name='id_usuario' value='$id_usuario' type='hidden'></input>
				<input id='id_academico' name='id_academico' value='$id_academico' type='hidden'></input>
			</tr>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Email</th>
			</tr>
			<tr>
				<th><input id='nombre' name='nombre' type='text' value='$nombre'></input></th>
				<th><input id='apellidos' name='apellidos' type='text' value='$apellidos'></input></th>
				<th><input id='email' name='email' type='text' value='$email'></input></th>
			</tr>
			<tr>
				<th>Grado de estudios</th>
				<th>Centro universitario</th>
				<th>Clave única de maestro</th>
			</tr>
			<tr>
				<th><input id='gradoEstudios' name='gradoEstudios' type='text' value=$gradoEstudios></input></th>
				<th><input id='centroUniAct' name='centroUniAct' type='text' value='$centroUniAct'></input></th>
				<th><input id='clave' name='clave' type='text' value='$clave'></input></th>
			</tr>

			<tr>
				<th>Líneas Inv.</th>
			</tr>
			<tr>
				<th>";
		    	/*while($rw = mysqli_fetch_assoc($res)){
		    		echo "".$rw["lin_inves"]. "<br/>";
		    	}*/
    	

    	echo "
    			</th>
    		</tr>

			<tr>
				<th><button id=\"mod\" type=\"button\" name=\"mod\" onclick='modificarDatos(
				    id_academico.value,
				    id_usuario.value,
				    password.value,
				    nombre.value,
				    apellidos.value,
				    email.value,
				    gradoEstudios.value,
				    centroUniAct.value,
				    clave.value,
				    username.value)'>Modificar</button></th>
			</tr>
		</table>";
    
?>