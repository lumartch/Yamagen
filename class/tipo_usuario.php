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
				$fecha = $_POST['fecha'];
				$aux = new Articulo;
				$aux->crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fecha, $username, $nombre, $apellidos);
			}
			else if($publicacion == "bibliografico"){
				$nombreRevista = $_POST['nomRev'];
				$noPaginas = $_POST['noPag'];
				$isbn = $_POST['isbn'];
				$fecha = $_POST['fecha'];
				$editorial = $_POST['editorial'];
				$aux = new Bibliografico;
				$aux->crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fecha, $username, $nombre, $apellidos);
			}
			else if($publicacion == "informe"){
				$dependencia = $_POST['nomDep'];
				$fecha = $_POST['fecha'];
				$aux = new Informe_Tecnico;
				$aux->crear($nombrePub, $dependencia, $fecha, $username, $nombre, $apellidos);
			}
			else if($publicacion == "prod_innovadora"){
				$dependencia = $_POST['noReg'];
				$fecha = $_POST['fecha'];
				$aux = new Prod_Innovadora;
				$aux->crear($nombrePub, $dependencia, $fecha, $username, $nombre, $apellidos);
			}
			else if($publicacion == "manual"){
				$dependencia = $_POST['noReg'];
				$fecha = $_POST['fecha'];
				$aux = new Manual_Operacion;
				$aux->crear($nombrePub, $dependencia, $fecha, $username, $nombre, $apellidos);
			}
			else if($publicacion == "prototipo"){
				$dependencia = $_POST['noReg'];
				$fecha = $_POST['fecha'];
				$aux = new Prototipo;
				$aux->crear($nombrePub, $dependencia, $fecha, $username, $nombre, $apellidos);
			}

			else {
				echo "nope";
			}
		}
		
		public function eliminarPublicacion($tipo, $username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			if($tipo == "linInnov"){
				$delete = "DELETE FROM LIN_INNOVADORA WHERE id='$id' and nomInvestigacion='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "dirInd"){
				$delete = "DELETE FROM DIRECCION WHERE id='$id' and nomDireccion='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "estadia"){
				$delete = "DELETE FROM ESTADIA WHERE id='$id' and nomEstadia='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "proInv"){
				$delete = "DELETE FROM PROY_INVESTIGACION WHERE id='$id' and nomProyecto='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "articulo"){
				$delete = "DELETE FROM ARTICULO WHERE id='$id' and nomArticulo='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "bibliografico"){
				$delete = "DELETE FROM BIBLIOGRAFICO WHERE id='$id' and nomArticulo='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "informe"){
				$delete = "DELETE FROM INFORME_TECNICO WHERE id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "prodInnov"){
				$delete = "DELETE FROM PROD_INNOVADORA WHERE id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "manual"){
				$delete = "DELETE FROM MANUAL_OPERACION WHERE id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "prototipo"){
				$delete = "DELETE FROM PROTOTIPO WHERE id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $delete)){
					echo 'Produccion Eliminada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			
			else{
				echo "error";
			}

			mysqli_close($conn);
		}

		public function mostrarPublicacion(){

		}
		
		public function editarPublicacion(){

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
			}
			else if($tipo == "dirInd"){
				$update = "UPDATE DIRECCION SET status=true where id='$id' and nomDireccion='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "estadia"){
				$update = "UPDATE ESTADIA SET status=true where id='$id' and nomEstadia='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "proInv"){
				$update = "UPDATE PROY_INVESTIGACION SET status=true where id='$id' and nomProyecto='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "articulo"){
				$update = "UPDATE ARTICULO SET status=true where id='$id' and nomArticulo='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "bibliografico"){
				$update = "UPDATE BIBLIOGRAFICO SET status=true where id='$id' and nomArticulo='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "informe"){
				$update = "UPDATE INFORME_TECNICO SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "prodInnov"){
				$update = "UPDATE PROD_INNOVADORA SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "manual"){
				$update = "UPDATE MANUAL_OPERACION SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}
			else if($tipo == "prototipo"){
				$update = "UPDATE PROTOTIPO SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
				if(mysqli_query($conn, $update)){
					echo 'Produccion aceptada';
				}
				else{
					echo 'Error de produccion';
				}
			}

			else{
				echo "error";
			}
			mysqli_close($conn);
		}
		
		public function mostrarUsuario(){

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