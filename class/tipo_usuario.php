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
			$id_academico = $_SESSION['id_academico'];

			if($publicacion == "lin_innovadora"){
				$aux = new Lin_Innovadora;
				$aux->crear($nombrePub, $id_academico);
			}
			else if($publicacion == "direccion"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$nomAlumno = $_POST['alumno'];
				$aux = new Direccion;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $id_academico);
			}
			else if($publicacion == "estadia"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$nomAlumno = $_POST['alumno'];
				$aux = new Estadia;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $id_academico);
			}
			else if($publicacion == "proy_inv"){
				$fechaIni = $_POST['fechaIni'];
				$fechaFin = $_POST['fechaFin'];
				$nomEmpresa = $_POST['empresa'];
				$aux = new Proy_Investigacion;
				$aux->crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $id_academico);
			}
			else if($publicacion == "articulo"){
				$nombreRevista = $_POST['nomRev'];
				$noPaginas = $_POST['noPag'];
				$isbn = $_POST['isbn'];
				$fechaPublicacion = $_POST['fecha'];
				$id_tipo = $_POST['tipo'];
				$aux = new Articulo;
				$aux->crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $id_academico, $id_tipo);
			}
			else if($publicacion == "bibliografico"){
				$nombreRevista = $_POST['nomRev'];
				$noPaginas = $_POST['noPag'];
				$isbn = $_POST['isbn'];
				$fechaPublicacion = $_POST['fecha'];
				$editorial = $_POST['editorial'];
				$id_tipo = $_POST['tipo'];
				$aux = new Bibliografico;
				$aux->crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fechaPublicacion, $id_academico, $id_tipo);
			}
			else if($publicacion == "informe"){
				$dependencia = $_POST['nomDep'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Informe_Tecnico;
				$aux->crear($nombrePub, $dependencia, $fechaPublicacion, $id_academico);
			}
			else if($publicacion == "prod_innovadora"){
				$noRegistro = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Prod_Innovadora;
				$aux->crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico);
			}
			else if($publicacion == "manual"){
				$noRegistro = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Manual_Operacion;
				$aux->crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico);
			}
			else if($publicacion == "prototipo"){
				$noRegistro = $_POST['noReg'];
				$fechaPublicacion = $_POST['fecha'];
				$aux = new Prototipo;
				$aux->crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico);
			}

			else {
				echo "nope";
			}
		}
		
		public function eliminarPublicacion($tipo, $id_academico, $nom, $id){
			if($tipo == "linInnov"){
				$aux = new Lin_Innovadora;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "dirInd"){
				$aux = new Direccion;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "estadia"){
				$aux = new Estadia;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "proInv"){
				$aux = new Proy_Investigacion;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "articulo"){
				$aux = new Articulo;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "bibliografico"){
				$aux = new Bibliografico;
				$aux->eliminar($id_academico, $nom, $id);
				
			}
			else if($tipo == "informe"){
				$aux = new Informe_Tecnico;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "prodInnov"){
				$aux = new Prod_Innovadora;
				$aux->eliminar($id_academico, $nom, $id);
				
			}
			else if($tipo == "manual"){
				$aux = new Manual_Operacion;
				$aux->eliminar($id_academico, $nom, $id);
			}
			else if($tipo == "prototipo"){
				$aux = new Prototipo;
				$aux->eliminar($id_academico, $nom, $id);
			}
			
			else{
				echo "error";
			}
		}

		public function mostrarPublicacion(){

		}
		
		public function editarPublicacion($tipo, $id_pub){
			if($tipo == 1){
				$aux = new Lin_Innovadora;
				$nombre = $_GET["nombre"];
				$aux->actualizar($id_pub, $nombre);
			}
			else if($tipo == 2){
				$nomArt = $_GET['nombre'];
				$nombreRevista = $_GET['nomRev'];
				$noPaginas = $_GET['noPag'];
				$isbn = $_GET['isbn'];
				$fechaPublicacion = $_GET['fecha'];
				$id_tipo_art = $_GET['tipoArt'];
				$aux = new Articulo;
				$aux->actualizar($id_pub, $nomArt, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $id_tipo_art);
			}
			else if($tipo == 3){
				$nomArt = $_GET['nombre'];
				$nombreRevista = $_GET['nomRev'];
				$noPaginas = $_GET['noPag'];
				$isbn = $_GET['isbn'];
				$fechaPublicacion = $_GET['fecha'];
				$editorial = $_GET['editorial'];
				$id_tipo_art = $_GET['tipoArt'];
				$aux = new Bibliografico;
				$aux->actualizar($id_pub, $nomArt, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $editorial ,$id_tipo_art);
			}
			else if($tipo == 4){
				$nomPub = $_GET['nombre'];
				$dependencia = $_GET['nomDep'];
				$fechaPublicacion = $_GET['fecha'];
				$aux = new Informe_Tecnico;
				$aux->actualizar($id_pub, $nomPub, $dependencia, $fechaPublicacion);
			}
			else if($tipo == 5){
				$nomPub = $_GET['nombre'];
				$noRegistro = $_GET['noReg'];
				$fechaPublicacion = $_GET['fecha'];
				$aux = new Manual_Operacion;
				$aux->actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion);
			}
			else if($tipo == 6){
				$nomPub = $_GET['nombre'];
				$noRegistro = $_GET['noReg'];
				$fechaPublicacion = $_GET['fecha'];
				$aux = new Prod_Innovadora;
				$aux->actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion);
			}
			else if($tipo == 7){
				$nomPub = $_GET['nombre'];
				$noRegistro = $_GET['noReg'];
				$fechaPublicacion = $_GET['fecha'];
				$aux = new Prototipo;
				$aux->actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion);
			}
			else if($tipo == 8){
				$nomPub = $_GET['nombre'];
				$empresa = $_GET['empresa'];
				$fechaIni = $_GET['fechaIni'];
				$fechaFin = $_GET['fechaFin'];
				$aux = new Proy_Investigacion;
				$aux->actualizar($id_pub, $nomPub, $empresa, $fechaIni, $fechaFin);
			}
			else if($tipo == 9){
				$nomDireccion = $_GET['nombre'];
				$empresa = $_GET['empresa'];
				$fechaIni = $_GET['fechaIni'];
				$fechaFin = $_GET['fechaFin'];
				$alumno = $_GET['alumno'];
				$aux = new Direccion;
				$aux->actualizar($id_pub, $nomDireccion, $empresa, $fechaIni, $fechaFin, $alumno);
			}
			else if($tipo == 10){
				$nomEstadia = $_GET['nombre'];
				$empresa = $_GET['empresa'];
				$fechaIni = $_GET['fechaIni'];
				$fechaFin = $_GET['fechaFin'];
				$alumno = $_GET['alumno'];
				$aux = new Estadia;
				$aux->actualizar($id_pub, $nomEstadia, $empresa, $fechaIni, $fechaFin, $alumno);
			}
			else {
				echo "nope";
			}
		}
	}



	class Admin extends Usr{
		function __construct(){

		}

		public function crearUsuario($username, $password, $nombre, $apellidos, $email){
			$academico = new Academico;
			$academico->crear($nombre, $apellidos, $email);
			$usuario = new Usuario;
			$usuario->crear($username, $password, $nombre, $apellidos, $email);
		}

		public function modificarUsuario($id_academico, $id_usuario, $password, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave){
			$usuario = new Usuario;
			$usuario->modificar($id_usuario, $password);
			$academico = new Academico;

			$academico->modificar($id_academico, $nombre, $apellidos, $email, $centroUniversitario, $grado_estudios, $clave);
		}

		public function mostrarUsuario($username){
			$usuario = new Usuario;
			$usuario->mostrar($username);
		}

		
		public function eliminarUsuario($id_usuario){
			$usuario = new Usuario;
			$usuario->eliminar($id_usuario);
		}

		public function aceptarPublicacion($tipo, $id_academico, $nom, $id){
			if($tipo == "linInnov"){
				$aux = new Lin_Innovadora;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "dirInd"){
				$aux = new Direccion;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "estadia"){
				$aux = new Estadia;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "proInv"){
				$aux = new Proy_Investigacion;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "articulo"){
				$aux = new Articulo;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "bibliografico"){
				$aux = new Bibliografico;
				$aux->aceptar($id_academico, $nom, $id);
				
			}
			else if($tipo == "informe"){
				$aux = new Informe_Tecnico;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "prodInnov"){
				$aux = new Prod_Innovadora;
				$aux->aceptar($id_academico, $nom, $id);
				
			}
			else if($tipo == "manual"){
				$aux = new Manual_Operacion;
				$aux->aceptar($id_academico, $nom, $id);
			}
			else if($tipo == "prototipo"){
				$aux = new Prototipo;
				$aux->aceptar($id_academico, $nom, $id);
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