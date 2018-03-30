<?php
	include "usuario.php";

	class Generar_PDF{
		
	}

	class Usr {
		function __construct(){
			
		}

		public function crearPublicacion(){

		}

		public function mostrarPublicacion(){

		}
		
		public function editarPublicacion(){

		}
		
		public function eliminarPublicacion(){

		}

	}

	class Admin extends Usr{
		function __construct(){

		}

		public function crearUsuario(Usuario $usuario){
			$username = $usuario->getUsername();
			$email = $usuario->getEmail();
			$password = $usuario->getPassword();
			$nombre = $usuario->getNombre();
			$apellidos = $usuario->getApellidos();
			$centroUniversitario = $usuario->getCentroUniversitario();
			$grado_estudios = $usuario->getGradoEstudios();
			$clave = $usuario->getClave();

			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$insert = ("Insert into USUARIO(username, email, password, nombre, apellidos, centroUniAct, gradoEstudios, clave, id_tipo_usuario) 
				values('$username', '$email', '$password', '$nombre', '$apellidos', '$centroUniversitario', '$grado_estudios', '$clave', 2)");
			if(mysqli_query($conn, $insert)){
				echo "Nuevo usuario creado.";
				mysqli_close($conn);
			}
			else{
				echo "Error: ". mysqli_error($conn);
				mysqli_close($conn);
			}
		}

		public function mostrarUsuario(){

		}
		
		public function editarUsuario(){

		}
		
		public function eliminarUsuario(){

		}
	}

	class Tipo_Usuario{
		public $admin;	
		public $usr;
		function __construct(){
			$this->admin = new Admin;
			$this->usr = new Usr;
		}

		public function generarPDF(){

		}
	}
?>