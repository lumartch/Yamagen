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

		public function editar($username){
			$this->username = $username;
		}

		public function mostrar($username){
			$this->username = $username;
		}

	}


?>