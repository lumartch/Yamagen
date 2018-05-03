<?php 
	//include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");

	class Academico{
		private $id_academico;
		private $nombre;
		private $apellidos;
		private $email;
		private $centroUniversitario;
		private $grado_estudios = '';
		private $clave;
		function __construct(){

		}
		public function crear($nombre, $apellidos, $email){
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;

			$aux = new Conexion;
			$conn = $aux->conexion();

			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}
			$insert = ("INSERT INTO ACADEMICO(nombre, apellidos, email) VALUES ('$nombre', '$apellidos', '$email')");
			if(mysqli_query($conn, $insert)){
				echo "Nuevo Academico creado.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		public function modificar($id_academico, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave){
			$this->id_academico = $id_academico;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->email = $email;
			$this->centroUniversitario = $centroUniversitario;
			$this->grado_estudios = $grado_estudios;
			$this->clave = $clave;

			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$update = ("UPDATE  ACADEMICO SET nombre = '$this->nombre', apellidos = '$this->apellidos', email = '$this->email', 
						centroUniAct = '$this->centroUniversitario', gradoEstudios = '$this->grado_estudios', clave = '$this->clave'  WHERE id = '$this->id_academico'");

			if(mysqli_query($conn, $update)){
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function eliminar($id){

		}
	}

	class Usuario {
		private $id_usuario;
		private $username;
		private $password;
		private $id_academico;

		function __construct(){

		}

		public function crear($username, $password, $nombre, $apellidos, $email){
			$this->username = $username;
			$this->password = $password;

			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$select_academico = ("SELECT id FROM ACADEMICO WHERE nombre = '$nombre' and apellidos = '$apellidos' and email = '$email'");
			$this->id_academico = mysqli_query($conn, $select_academico);
			$id = mysqli_fetch_assoc($this->id_academico);
			$id_A = $id["id"];
			
			$insert = ("INSERT INTO USUARIO (username, password, id_tipo_usuario, id_academico) VALUES ('$username', '$password', 2, '$id_A')");

			if(mysqli_query($conn, $insert)){
				echo "Nuevo usuario creado.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function modificar($id_usuario, $password){
			$this->password = $password;
			$this->id_usuario = $id_usuario;

			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$update = ("UPDATE  USUARIO SET password = '$this->password' WHERE id = '$this->id_usuario'");
			if(mysqli_query($conn, $update)){
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function eliminar($id_usuario){
			$this->id_usuario = $id_usuario;
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$delete = ("DELETE FROM USUARIO WHERE id = '$this->id_usuario'");
			if(mysqli_query($conn, $delete)){ }
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}


		/*public function mostrar($username){
			$aux = new Conexion;
			$conn = $aux->conexion();
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
		}*/

	}
?>