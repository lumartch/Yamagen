<?php
	class Producto_Status{
		
		private $username;
		private $nombre;
		private $apellidos;
		private $status;

		public function __construct(){
			$this->status = false;
		}

	}


	class Lin_Innovadora extends Producto_Status{
		private $nomInvestigacion;

		public function __construct(){
			$this->nomInvestigacion = "";
		}

		public function crear($nombrePub, $username, $nombre, $apellidos){
			$this->nomInvestigacion = $nombrePub;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$this->username = $username;

			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO LIN_INNOVADORA (nomInvestigacion, usrname, nombre, apellidos, status, fechaInsercion) 
			VALUES ('$this->nomInvestigacion','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM LIN_INNOVADORA WHERE id='$id' and nomInvestigacion='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE LIN_INNOVADORA SET status=true where id='$id' and nomInvestigacion='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);

		}


	}

	class Direccion extends Producto_Status{
		private $nomDireccion;
		private $fechaIni;
		private $fechaFin;
		private $nomEmpresa;
		private $nomAlumno;

		public function __construct(){

		}

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $username, $nombre, $apellidos) {
			$this->nomDireccion = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->nomAlumno = $nomAlumno;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;

			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO DIRECCION(nomDireccion, fechaIni, fechaFin, nomEmpresa, nombreAlumno, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomDireccion', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM DIRECCION WHERE id='$id' and nomDireccion='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE DIRECCION SET status=true where id='$id' and nomDireccion='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}
	}

	class Estadia extends Producto_Status{
		private $nomEstadia;
		private $fechaIni;
		private $fechaFin;
		private $nomEmpresa;
		private $nomAlumno;

		public function __construct(){

		}

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $username, $nombre, $apellidos) {
			$this->nomEstadia = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->nomAlumno = $nomAlumno;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;

			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO ESTADIA(nomEstadia, fechaIni, fechaFin, nomEmpresa, nombreAlumno, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomEstadia', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM ESTADIA WHERE id='$id' and nomEstadia='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE ESTADIA SET status=true where id='$id' and nomEstadia='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}
	}

	class Proy_Investigacion extends Producto_Status{
		private $nomEstadia;
		private $fechaIni;
		private $fechaFin;
		private $nomEmpresa;

		public function __construct(){

		}

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $username, $nombre, $apellidos) {
			$this->nomProyecto = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;

			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO PROY_INVESTIGACION(nomProyecto, fechaIni, fechaFin, nomEmpresa, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomProyecto', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM PROY_INVESTIGACION WHERE id='$id' and nomProyecto='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE PROY_INVESTIGACION SET status=true where id='$id' and nomProyecto='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}
	}

	class Prod_Academica extends Producto_Status{
		private $fechaPublicacion;
		public function __construct(){

		}
	}

	class Articulo extends Prod_Academica{
		private $nomArticulo;
		private $nombreRevista;
		private $noPaginas;
		private $isbn;
		private $id_tipo;

		public function __construct(){

		}

		public function crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $username, $nombre, $apellidos, $id_tipo){
			$this->nomArticulo = $nombrePub;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->nombreRevista = $nombreRevista;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;

			$this->id_tipo = $id_tipo;

			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO ARTICULO(nomArticulo, nombreRevista, noPaginas, isbn, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion, id_tipo_articulo)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->noPaginas','$this->isbn', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos',
			 '$this->status', NOW(), '$this->id_tipo')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM ARTICULO WHERE id='$id' and nomArticulo='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE ARTICULO SET status=true where id='$id' and nomArticulo='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}
	}

	class Bibliografico extends Prod_Academica{
		private $nomArticulo;
		private $nombreRevista;
		private $noPaginas;
		private $isbn;
		private $editorial;
		private $id_tipo;

		public function __construct(){

		}

		public function crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fechaPublicacion, $username, $nombre, $apellidos, $id_tipo){
			$this->nomArticulo = $nombrePub;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->nombreRevista = $nombreRevista;
			$this->editorial = $editorial;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;

			$this->id_tipo = $id_tipo;


			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO BIBLIOGRAFICO(nomArticulo, nombreRevista, editorial, noPaginas, isbn, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion, id_tipo_biblio)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->editorial','$this->noPaginas','$this->isbn', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos', 
				'$this->status', NOW(), '$this->id_tipo')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM BIBLIOGRAFICO WHERE id='$id' and nomArticulo='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE BIBLIOGRAFICO SET status=true where id='$id' and nomArticulo='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}
	}


	class Informe_Tecnico extends Prod_Academica{
		private $nomPub;
		private $dependencia;

		public function __construct(){

		}

		public function crear($nombrePub, $dependencia, $fechaPublicacion, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->dependencia = $dependencia;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO INFORME_TECNICO(nomPub, dependencia, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomPub', '$this->dependencia', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM INFORME_TECNICO WHERE id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE INFORME_TECNICO SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}

	}

	class Prod_Innovadora extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO PROD_INNOVADORA(nomPub, noRegistro, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM PROD_INNOVADORA WHERE id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE PROD_INNOVADORA SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}

	}

	class Manual_Operacion extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO MANUAL_OPERACION(nomPub, noRegistro, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM MANUAL_OPERACION WHERE id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE MANUAL_OPERACION SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}

	}

	class Prototipo extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO PROTOTIPO(nomPub, noRegistro, fechaPublicacion, usrname, nombre, apellidos, status, fechaInsercion)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion','$this->username','$this->nombre','$this->apellidos', '$this->status', NOW())";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$delete = "DELETE FROM PROTOTIPO WHERE id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($username, $nom, $id){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$update = "UPDATE PROTOTIPO SET status=true where id='$id' and nomPub='$nom' and usrname='$username'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}

	}

?>