<?php
	session_start();
	include "usuario.php";
	include "publicacion.php";
	
	class Generar_PDF{
		
	}

	class Usr {
		function __construct(){
			
		}

		public function crearPublicacion($publicacion, $lin_nombre){
			$username = $_SESSION['username'];
			$nombre = $_SESSION['nombre'];
			$apellidos = $_SESSION['apellidos'];

			if($publicacion == "lin_innovadora"){
				$aux = new Lin_Innovadora;
				$aux->crear($lin_nombre, $username, $nombre, $apellidos);
			}



			else {
				echo "nope";
			}
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
		
		public function eliminarUsuario(){

		}

		public function aceptarPublicacion($tipo, $username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			if($tipo == "linInnov"){
				$update = "UPDATE LIN_INNOVADORA SET status=true where id='$id' and nomInvestigacion='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
				mysqli_close($conn);
			}
			else{
				echo "error";
			}
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