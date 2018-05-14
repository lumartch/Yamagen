<?php 
	class Academico{
		private $id_academico;
		private $fotografia;
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
			$insert = "INSERT INTO ACADEMICO(fotografia, nombre, apellidos, email, centroUniAct, gradoEstudios, clave) VALUES ('/imagenes/logo.png', '$nombre', '$apellidos', '$email', 'N/A', 'N/A', 'N/A')";
			if(mysqli_query($conn, $insert)){
				echo "Nuevo Academico creado.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);

		}

		public function modificarAcademico($id_academico, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave){
			$this->id_academico = $id_academico;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->email = $email;
			$this->centroUniversitario = $centroUniversitario;
			$this->grado_estudios = $grado_estudios;
			$this->clave = $clave;

			$aux = new Conexion;
			$conn = $aux->conexion();

			$update = "UPDATE  ACADEMICO SET nombre = '$this->nombre', apellidos = '$this->apellidos', email = '$this->email', 
						centroUniAct = '$this->centroUniversitario', gradoEstudios = '$this->grado_estudios', clave = '$this->clave'  
						WHERE id = '$this->id_academico'";
			mysqli_query($conn, $update);
			mysqli_close($conn);
			//echo $this->id_academico;
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

			$update = "UPDATE  ACADEMICO SET nombre = '$this->nombre', apellidos = '$this->apellidos', email = '$this->email', 
						centroUniAct = '$this->centroUniversitario', gradoEstudios = '$this->grado_estudios', clave = '$this->clave'  
						WHERE id = '$this->id_academico'";

			if(mysqli_query($conn, $update)){
				$delete = "DELETE FROM USR_LIN_INVES WHERE id_academico = '$id_academico'";
				mysqli_query($conn, $delete);
				if(isset($_POST["lineas"])){
					$number = count($_POST["lineas"]);
					if($number > 1) {
						for($i = 0; $i < $number; $i++) {
							if(trim($_POST["lineas"][$i] != '')){
								$linea = $_POST["lineas"][$i];
								echo $linea."->";

								$insertLin = "INSERT INTO LINEA_INVESTIGACION(linea) VALUES('$linea')";
								mysqli_query($conn, $insertLin);

								$select = "SELECT * FROM LINEA_INVESTIGACION WHERE linea = '$linea'";
								$query = mysqli_query($conn, $select);
								$row = mysqli_fetch_assoc($query);
								$id_linea = $row["id"];

								$insert = "INSERT INTO USR_LIN_INVES(id_academico, id_lin_inves) VALUES ('$id_academico', '$id_linea')";
								mysqli_query($conn, $insert);
							}
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function cambiarFoto($id_academico, $fotografia){
			$this->id_academico;
			$this->fotografia = $fotografia;
			$aux = new Conexion;
			$conn = $aux->conexion();
			$updateFoto = "UPDATE ACADEMICO SET fotografia = '$fotografia' WHERE id = '$id_academico'";
			mysqli_query($conn, $updateFoto);
			mysqli_close($conn);

		}
		public function eliminar($id){
			$this->id_academico = $id;
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}
			$deleteUs = "DELETE FROM USUARIO WHERE id_academico = '$this->id_academico'";
			mysqli_query($conn, $deleteUs);

			$delete = "DELETE FROM ACADEMICO WHERE id = '$this->id_academico'";
			if(mysqli_query($conn, $delete)){ 
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function mostrar($id){
			$this->id_academico = $id;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$select = "SELECT * FROM ACADEMICO WHERE id = '$id_academico'";
			$resultado =  mysqli_query($conn, $select);
			$queryRes = mysqli_fetch_assoc($resultado);
			$json = $queryRes;

			$select = "SELECT * FROM USR_LIN_INVES WHERE id_academico = '$id_academico'";
			$resultado =  mysqli_query($conn, $select);
			$jsonLineas = array();
			while($queryRes = mysqli_fetch_assoc($resultado)){
				$selectLin = "SELECT linea FROM LINEA_INVESTIGACION WHERE id = '".$queryRes["id_lin_inves"]."'";
				$resLin = mysqli_query($conn, $selectLin);
				$jsonLineas += mysqli_fetch_assoc($resLin);
			}

			$json += array("LINEAS" => $jsonLineas);
			mysqli_close($conn);
			echo json_encode($json);
		}

		public function mostrarTodos(){
			$aux = new Conexion;
			$conn = $aux->conexion();

			$select = "SELECT * FROM ACADEMICO WHERE id <> 1";
			$resultado =  mysqli_query($conn, $select);
			$json = array();
			$i = 0;
			while($queryRes = mysqli_fetch_assoc($resultado)){
				$json[$i] = $queryRes;
				$i++;
			}
			mysqli_close($conn);
			echo json_encode($json);
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

			$select_academico = "SELECT id FROM ACADEMICO WHERE nombre = '$nombre' and apellidos = '$apellidos' and email = '$email'";
			$this->id_academico = mysqli_query($conn, $select_academico);
			$id = mysqli_fetch_assoc($this->id_academico);
			$id_A = $id["id"];
			
			$insert = "INSERT INTO USUARIO (username, password, id_tipo_usuario, id_academico) VALUES ('$username', '$password', 2, '$id_A')";

			if(mysqli_query($conn, $insert)) {
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

			$update = "UPDATE  USUARIO SET password = '$this->password' WHERE id = '$this->id_usuario'";
			if(mysqli_query($conn, $update)){
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

			$delete = "DELETE FROM USUARIO WHERE id = '$this->id_usuario'";
			if(mysqli_query($conn, $delete)){ }
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}

		public function mostrar($id_usuario, $id_academico){
			$this->id_usuario = $id_usuario;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$select = "SELECT * FROM USUARIO WHERE id = '$this->id_usuario'";
			$resultado =  mysqli_query($conn, $select);
			$queryRes = mysqli_fetch_assoc($resultado);
			$json = $queryRes;

			$select = "SELECT * FROM ACADEMICO WHERE id = '$id_academico'";
			$resultado =  mysqli_query($conn, $select);
			$queryRes = mysqli_fetch_assoc($resultado);
			$json += $queryRes;

			$select = "SELECT * FROM USR_LIN_INVES WHERE id_academico = '$id_academico'";
			$resultado =  mysqli_query($conn, $select);
			$jsonUsr = array();
			$j = 0;
			while($queryRes = mysqli_fetch_assoc($resultado)){
				$selectLin = "SELECT linea FROM LINEA_INVESTIGACION WHERE id = '".$queryRes["id_lin_inves"]."'";
				$resLin = mysqli_query($conn, $selectLin);
				$queryNom = mysqli_fetch_assoc($resLin);
				$jsonUsr[$j] = $queryNom;
				$j++;
			}
			$json += array( "LINEAS" => $jsonUsr);

			mysqli_close($conn);
			echo json_encode($json);
		}

		public function mostrarTodos(){
			$aux = new Conexion;
			$conn = $aux->conexion();

			$select = "SELECT * FROM USUARIO WHERE id_tipo_usuario = 2";
			$resultado =  mysqli_query($conn, $select);
			$json = array();
			$jsonDatos = array(); 
			$i = 0;
			while($queryRes = mysqli_fetch_assoc($resultado)){

				//Datos de la tabla USUARIO
				$id_academico = $queryRes["id_academico"];
				$jsonDatos = $queryRes;

				//Datos de la tabla ACADEMICO
				$select = "SELECT * FROM ACADEMICO WHERE id = '$id_academico'";
				$resAC =  mysqli_query($conn, $select);
				$queryAc = mysqli_fetch_assoc($resAC);
				$jsonDatos += $queryAc;

				$json[$i] = $jsonDatos;
				$i++;
			}
			mysqli_close($conn);
			echo json_encode($json);
		}

	}
?>