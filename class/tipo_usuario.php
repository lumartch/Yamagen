<?php
	session_start();
	include "usuario.php";
	include "publicacion.php";
	
	class Generar_PDF{
		
	}

	class Usr {
		function __construct(){
			
		}

		public function crearPublicacion($publicacion, $nombrePub){
			$username = $_SESSION['username'];
			$nombre = $_SESSION['nombre'];
			$apellidos = $_SESSION['apellidos'];

			if($publicacion == "lin_innovadora"){
				$aux = new Lin_Innovadora;
				$aux->crear($nombrePub, $username, $nombre, $apellidos);
			}
			else if($publicacion == "direccion"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$nomAlumno = $_POST['alumno'];
				$aux = new Direccion;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $username, $nombre, $apellidos);
			}
			else if($publicacion == "estadia"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$nomAlumno = $_POST['alumno'];
				$aux = new Estadia;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $username, $nombre, $apellidos);
			}
			else if($publicacion == "proy_inv"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$aux = new Proy_Investigacion;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $username, $nombre, $apellidos);
			}
			else if($publicacion == "articulo"){
				$nombreRevista = $_POST['nomRev'];
				$noPaginas = $_POST['noPag'];
				$isbn = $_POST['isbn'];
				$fechaPublicacion = $_POST['fecha'];
				$id_tipo = $_POST['tipo'];
				$aux = new Articulo;
				$aux->crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $username, $nombre, $apellidos, $id_tipo);
			}
			else if($publicacion == "bibliografico"){
				$nombreRevista = $_POST['nomRev'];
				$noPaginas = $_POST['noPag'];
				$isbn = $_POST['isbn'];
				$fechaPublicacion = $_POST['fecha'];
				$editorial = $_POST['editorial'];
				$id_tipo = $_POST['tipo'];
				$aux = new Bibliografico;
				$aux->crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fechaPublicacion, $username, $nombre, $apellidos, $id_tipo);
			}
			else if($publicacion == "informe"){
				$dependencia = $_POST['nomDep'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Informe_Tecnico;
				$aux->crear($nombrePub, $dependencia, $fechaPublicacion, $username, $nombre, $apellidos);
			}
			else if($publicacion == "prod_innovadora"){
				$dependencia = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Prod_Innovadora;
				$aux->crear($nombrePub, $dependencia, $fechaPublicacion, $username, $nombre, $apellidos);
			}
			else if($publicacion == "manual"){
				$dependencia = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Manual_Operacion;
				$aux->crear($nombrePub, $dependencia, $fechaPublicacion, $username, $nombre, $apellidos);
			}
			else if($publicacion == "prototipo"){
				$dependencia = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Prototipo;
				$aux->crear($nombrePub, $dependencia, $fechaPublicacion, $username, $nombre, $apellidos);
			}

			else {
				echo "nope";
			}
		}
		
		public function eliminarPublicacion($tipo, $username, $nom, $id){
			if($tipo == "linInnov"){
				$aux = new Lin_Innovadora;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "dirInd"){
				$aux = new Direccion;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "estadia"){
				$aux = new Estadia;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "proInv"){
				$aux = new Proy_Investigacion;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "articulo"){
				$aux = new Articulo;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "bibliografico"){
				$aux = new Bibliografico;
				$aux->eliminar($username, $nom, $id);
				
			}
			else if($tipo == "informe"){
				$aux = new Informe_Tecnico;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "prodInnov"){
				$aux = new Prod_Innovadora;
				$aux->eliminar($username, $nom, $id);
				
			}
			else if($tipo == "manual"){
				$aux = new Manual_Operacion;
				$aux->eliminar($username, $nom, $id);
			}
			else if($tipo == "prototipo"){
				$aux = new Prototipo;
				$aux->eliminar($username, $nom, $id);
			}
			
			else{
				echo "error";
			}
		}

		public function mostrarPublicacion(){

		}
		
		public function editarPublicacion(){

		}
	}



	class Admin extends Usr{
		function __construct(){

		}

		public function crearUsuario($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave){
			$usuario = new Usuario;
			$usuario->crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave);
		}

		public function modificarUsuario($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave){
			$usuario = new Usuario;
			$usuario->crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave);
		}

		public function mostrarUsuario($username){
			$usuario = new Usuario;
			$usuario->mostrar($username);
		}

		
		public function eliminarUsuario($username){
			$usuario = new Usuario;
			$usuario->eliminar($username);
		}

		public function aceptarPublicacion($tipo, $username, $nom, $id){
			if($tipo == "linInnov"){
				$aux = new Lin_Innovadora;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "dirInd"){
				$aux = new Direccion;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "estadia"){
				$aux = new Estadia;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "proInv"){
				$aux = new Proy_Investigacion;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "articulo"){
				$aux = new Articulo;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "bibliografico"){
				$aux = new Bibliografico;
				$aux->aceptar($username, $nom, $id);
				
			}
			else if($tipo == "informe"){
				$aux = new Informe_Tecnico;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "prodInnov"){
				$aux = new Prod_Innovadora;
				$aux->aceptar($username, $nom, $id);
				
			}
			else if($tipo == "manual"){
				$aux = new Manual_Operacion;
				$aux->aceptar($username, $nom, $id);
			}
			else if($tipo == "prototipo"){
				$aux = new Prototipo;
				$aux->aceptar($username, $nom, $id);
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