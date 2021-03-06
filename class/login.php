<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	class Login 
	{
		private $username;
		private $password;

		function __construct(){

		}
		
		public function login($usr, $pass){
			session_start();
			$this->username = $usr;
			$this->password = $pass;

			$aux = new Conexion;
			$conn = $aux->conexion();

			if(!$conn){
				echo 'Conexion no establecida'. mysql_error();
			}

			$select = "SELECT * FROM USUARIO WHERE username = '$this->username' and password = '$this->password'";
			$resultado = mysqli_query($conn, $select);
			$aux->cerrar($conn);			

			if (mysqli_num_rows($resultado) == 1) {

				//Inicio de sesion
				$_SESSION['isLogged'] = true;
				
				$_SESSION['username'] = $this->username;
				
				//Toma el tipo de usuario
				$fila = mysqli_fetch_assoc($resultado);

				$_SESSION['id_usuario'] = $fila['id'];
				$_SESSION['id_academico'] = $fila['id_academico'];

				$_SESSION['type_user'] = $fila['id_tipo_usuario'];
	            echo '<script type="text/javascript">
	            	window.location.href="/index.html";
	            </script>';
	            
			} else {
				//Regresa para indicar que no hubo inicio de sesión
				echo '<script type="text/javascript">
		            	alert("No existe el usuario, o la contraseña es erronea.");
		            	window.location.href="/index.html";
		            </script>';
			}
		}

		public function logout(){
			//Cierra sesion
			session_start();
			$_SESSION['isLogged'] = false;
			session_destroy();
			echo '<script type="text/javascript">
		            	alert("Cerrando sesión...");
		            	window.location.href="/index.html";
		            </script>';
		}
	}
?>