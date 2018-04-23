<?php 

	class Usuario {
		private $username;
		private $email;
		private $password;
		private $nombre;
		private $apellidos;
		private $centroUniversitario;
		private $grado_estudios;
		private $clave;

		function __construct(){

		}

		public function crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave){
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->centroUniversitario = $centroUniversitario;
			$this->grado_estudios = $grado_estudios;
			$this->clave = $clave;

			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$insert = ("Insert into USUARIO(username, email, password, nombre, apellidos, centroUniAct, gradoEstudios, clave, id_tipo_usuario) 
				values('$username', '$email', '$password', '$nombre', '$apellidos', '$centroUniversitario', '$grado_estudios', '$clave', 2)");
			if(mysqli_query($conn, $insert)){
				echo "Nuevo usuario creado.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function modificar($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave){
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->centroUniversitario = $centroUniversitario;
			$this->grado_estudios = $grado_estudios;
			$this->clave = $clave;

			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$insert = ("UPDATE  USUARIO  email = '$this->email', password = '$this->password', nombre = '$this->nombre', apellidos = '$this->apellidos', centroUniAct = '$this->centroUniversitario', 
				gradoEstudios = '$this->grado_estudios', clave = '$this->clave' WHERE username = '$this->username'");
			if(mysqli_query($conn, $insert)){
				echo "Nuevo usuario creado.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function eliminar($username){
			$this->username = $username;
			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$delete = ("Delete from USUARIO WHERE username = '$this->username'");
			if(mysqli_query($conn, $delete)){ }
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}


		public function mostrar($username){
			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}
			$select = "SELECT * FROM USUARIO WHERE '$username'";
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
							<th>Foto</th>
							<th>Username</th>
							<th>Nombre</th>
							<th>Apellidos</th>
						</tr>
						<tr>
							<th></th>
							<th><input id='username".$i."' name='username".$i."' type='text' value='$user' disabled></input></th>
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
							    nombre".$i.".value,
							    apellidos".$i.".value,
							    email".$i.".value,
							    gradoEstudios".$i.".value,
							    centroUniAct".$i.".value,
							    clave".$i.".value)'>Modificar</button></td>
							
						</tr>
					</table>
					<br/>";
				$i++;
		    }
		}

	}
?>