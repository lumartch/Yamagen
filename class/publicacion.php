<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	class Producto_Status{
		private $status;
		private $id_academico;

		public function __construct(){
			$this->status = false;
		}

	}


	class Lin_Innovadora extends Producto_Status{
		private $nomInvestigacion;

		public function __construct(){
			$this->nomInvestigacion = "";
		}

		public function crear($nombrePub, $id_academico){
			$this->nomInvestigacion = $nombrePub;
			$this->id_academico = $id_academico;
			$this->status = false;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO LIN_INNOVADORA (nomInvestigacion, status, fechaInsercion, id_academico) 
			VALUES ('$this->nomInvestigacion', '$this->status', NOW(), '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM LIN_INNOVADORA WHERE id='$id' AND nomInvestigacion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE LIN_INNOVADORA SET status=true WHERE id='$id' AND nomInvestigacion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}
		public function actualizar($id_pub, $nombre){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE LIN_INNOVADORA SET nomInvestigacion = '$nombre' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
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

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $id_academico) {
			$this->nomDireccion = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->nomAlumno = $nomAlumno;
			$this->id_academico = $id_academico;
			$this->status = false;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO DIRECCION(nomDireccion, fechaIni, fechaFin, nomEmpresa, nombreAlumno, status, fechaInsercion, id_academico)
			VALUES ('$this->nomDireccion', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno', '$this->status', NOW(), '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM DIRECCION WHERE id='$id' AND nomDireccion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE DIRECCION SET status=true WHERE id='$id' AND nomDireccion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);	
		}

		public function actualizar($id_pub, $nomDireccion, $nomEmpresa, $fechaIni, $fechaFin, $nombreAlumno){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE DIRECCION SET nomDireccion = '$nomDireccion', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin', nombreAlumno = '$nombreAlumno' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
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

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $nomAlumno, $id_academico) {
			$this->nomEstadia = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->nomAlumno = $nomAlumno;
			$this->id_academico = $id_academico;
			$this->status = false;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO ESTADIA(nomEstadia, fechaIni, fechaFin, nomEmpresa, nombreAlumno, status, fechaInsercion, id_academico)
			VALUES ('$this->nomEstadia', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno', '$this->status', NOW(), '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM ESTADIA WHERE id='$id' AND nomEstadia='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ESTADIA SET status=true WHERE id='$id' AND nomEstadia='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomEstadia, $nomEmpresa, $fechaIni, $fechaFin, $nombreAlumno){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ESTADIA SET nomEstadia = '$nomEstadia', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin', nombreAlumno = '$nombreAlumno' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}
	}

	class Proy_Investigacion extends Producto_Status{
		private $nomEstadia;
		private $fechaIni;
		private $fechaFin;
		private $nomEmpresa;

		public function __construct(){

		}

		public function crear($nombrePub, $fechaIni, $fechaFin, $nomEmpresa, $id_academico) {
			$this->nomProyecto = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->id_academico = $id_academico;
			$this->status = false;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO PROY_INVESTIGACION(nomProyecto, fechaIni, fechaFin, nomEmpresa, status, fechaInsercion, id_academico)
			VALUES ('$this->nomProyecto', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa',  '$this->status', NOW(), '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM PROY_INVESTIGACION WHERE id='$id' AND nomProyecto='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROY_INVESTIGACION SET status=true WHERE id='$id' AND nomProyecto='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $nomEmpresa, $fechaIni, $fechaFin){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROY_INVESTIGACION SET nomProyecto = '$nomPub', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
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

		public function crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $id_academico, $id_tipo){
			$this->nomArticulo = $nombrePub;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->nombreRevista = $nombreRevista;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->status = false;
			$this->id_academico = $id_academico;

			$this->id_tipo = $id_tipo;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO ARTICULO(nomArticulo, nombreRevista, noPaginas, isbn, fechaPublicacion, status, fechaInsercion, id_tipo_articulo, id_academico)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->noPaginas','$this->isbn', '$this->fechaPublicacion',
			 '$this->status', NOW(), '$this->id_tipo', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM ARTICULO WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ARTICULO SET status=true WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub ,$nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $id_tipo_art){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ARTICULO SET nomArticulo = '$nombrePub', nombreRevista = '$nombreRevista', noPaginas = '$noPaginas', 
												isbn = '$isbn', fechaPublicacion = '$fechaPublicacion', id_tipo_articulo = '$id_tipo_art' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
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

		public function crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fechaPublicacion, $id_academico, $id_tipo){
			$this->nomArticulo = $nombrePub;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->nombreRevista = $nombreRevista;
			$this->editorial = $editorial;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->status = false;
			$this->id_academico = $id_academico;

			$this->id_tipo = $id_tipo;


			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO BIBLIOGRAFICO(nomArticulo, nombreRevista, editorial, noPaginas, isbn, fechaPublicacion, status, fechaInsercion, id_tipo_biblio, id_academico)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->editorial','$this->noPaginas','$this->isbn', '$this->fechaPublicacion', 
				'$this->status', NOW(), '$this->id_tipo', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM BIBLIOGRAFICO WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE BIBLIOGRAFICO SET status=true WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			
		}

		public function actualizar($id_pub ,$nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $editorial, $id_tipo_art){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE BIBLIOGRAFICO SET nomArticulo = '$nombrePub', nombreRevista = '$nombreRevista', noPaginas = '$noPaginas', 
												isbn = '$isbn', fechaPublicacion = '$fechaPublicacion', editorial = '$editorial',
												id_tipo_biblio = '$id_tipo_art' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}
	}


	class Informe_Tecnico extends Prod_Academica{
		private $nomPub;
		private $dependencia;

		public function __construct(){

		}

		public function crear($nombrePub, $dependencia, $fechaPublicacion, $id_academico){
			$this->nomPub = $nombrePub;
			$this->dependencia = $dependencia;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO INFORME_TECNICO(nomPub, dependencia, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->dependencia', '$this->fechaPublicacion', '$this->status', NOW(), '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM INFORME_TECNICO WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE INFORME_TECNICO SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $dependencia, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE INFORME_TECNICO SET nomPub = '$nomPub', dependencia = '$dependencia', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}

	}

	class Prod_Innovadora extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO PROD_INNOVADORA(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', NOW(), '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM PROD_INNOVADORA WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROD_INNOVADORA SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE MANUAL_OPERACION SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}

	}

	class Manual_Operacion extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO MANUAL_OPERACION(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', NOW(), '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM MANUAL_OPERACION WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE MANUAL_OPERACION SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE MANUAL_OPERACION SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}

	}

	class Prototipo extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO PROTOTIPO(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', NOW(), '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM PROTOTIPO WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROTOTIPO SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROTOTIPO SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
			}
			else{
				echo 'Error de produccion';
			}
			mysqli_close($conn);
			echo '
				<script>
					window.location.href="/index.html";
				</script>';
		}

	}

?>