<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");

	class Producto_Status{
		private $status;
		private $id_academico;
		private $fechaInsercion;

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

			$this->fechaInsercion = date("Y-m-d H:i:s");

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO LIN_INNOVADORA (nomInvestigacion, status, fechaInsercion, id_academico) 
			VALUES ('$this->nomInvestigacion', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			
			//Realiza la inserción en la base de datos			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM LIN_INNOVADORA WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador,id_lin_innov) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}

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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE LIN_INNOVADORA SET status=true WHERE id='$id' AND nomInvestigacion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}
		public function actualizar($id_pub, $nombre){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE LIN_INNOVADORA SET nomInvestigacion = '$nombre' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){		
				$delete = "DELETE FROM COLABORADOR WHERE id_lin_innov = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador,id_lin_innov) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}


			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM LIN_INNOVADORA WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_lin_innov = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
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
			$this->fechaInsercion = date("Y-m-d H:i:s");
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
			VALUES ('$this->nomDireccion', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM DIRECCION WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_direccion) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE DIRECCION SET status=true WHERE id='$id' AND nomDireccion='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);	
		}

		public function actualizar($id_pub, $nomDireccion, $nomEmpresa, $fechaIni, $fechaFin, $nombreAlumno){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE DIRECCION SET nomDireccion = '$nomDireccion', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin', nombreAlumno = '$nombreAlumno' WHERE id='$id_pub'";
			
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_direccion = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador,id_direccion) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}

			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM DIRECCION WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_direccion = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
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
			$this->fechaInsercion = date("Y-m-d H:i:s");
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
			VALUES ('$this->nomEstadia', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM ESTADIA WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_estadia) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ESTADIA SET status=true WHERE id='$id' AND nomEstadia='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomEstadia, $nomEmpresa, $fechaIni, $fechaFin, $nombreAlumno){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ESTADIA SET nomEstadia = '$nomEstadia', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin', nombreAlumno = '$nombreAlumno' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_estadia = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador,id_estadia) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM ESTADIA WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_estadia = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
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
			$this->fechaInsercion = date("Y-m-d H:i:s");
			$this->nomProyecto = $nombrePub;
			$this->fechaIni = $fechaIni;
			$this->fechaFin = $fechaFin;
			$this->nomEmpresa = $nomEmpresa;
			$this->id_academico = $id_academico;
			$this->status = false;

			$aux = new Conexion;
			$conn = $aux->conexion();
			$insert = "INSERT INTO PROY_INVESTIGACION(nomProyecto, fechaIni, fechaFin, nomEmpresa, status, fechaInsercion, id_academico)
			VALUES ('$this->nomProyecto', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa',  '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM PROY_INVESTIGACION WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_proy_inves) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}

				$number = count($_POST["institucion"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["institucion"][$i] != '')){
							$nomInstitucion = $_POST["institucion"][$i];
							$sql = "INSERT INTO INSTITUCION(nomInstitucion, id_proy_inves) VALUES('$nomInstitucion', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROY_INVESTIGACION SET status=true WHERE id='$id' AND nomProyecto='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
				
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $nomEmpresa, $fechaIni, $fechaFin){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROY_INVESTIGACION SET nomProyecto = '$nomPub', nomEmpresa = '$nomEmpresa', fechaIni = '$fechaIni', fechaFin = '$fechaFin' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_proy_inves = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador,id_proy_inves) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}

				$delete = "DELETE FROM INSTITUCION WHERE id_proy_inves = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["institucion"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["institucion"][$i] != '')){
							$nomInstitucion = $_POST["institucion"][$i];
							$sql = "INSERT INTO INSTITUCION(nomInstitucion, id_proy_inves) VALUES('$nomInstitucion', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM PROY_INVESTIGACION WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_proy_inves = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);

			$selectInstitucion = "SELECT nomInstitucion FROM INSTITUCION WHERE id_proy_inves = '".$json["id"]."' ";
			$resultInst = mysqli_query($conn, $selectInstitucion);
			$jsonInst = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultInst)){
				$jsonInst[$i] = $in;
				$i++;
			}
			$json += array("INSTITUCION" => $jsonInst);


			mysqli_close($conn);

			echo json_encode($json);
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
			$this->fechaInsercion = date("Y-m-d H:i:s");
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
			 '$this->status', '$this->fechaInsercion', '$this->id_tipo', '$this->id_academico')";
			
			//Realiza la inserción en la base de datos			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM ARTICULO WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_articulo) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE ARTICULO SET status=true WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
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
				$delete = "DELETE FROM COLABORADOR WHERE id_articulo = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_articulo) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}


		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM ARTICULO WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);

			$selectTipo = "SELECT * FROM TIPO_ARTICULO WHERE id = '".$json["id_tipo_articulo"]."'";
			$resTipo = mysqli_query($conn, $selectTipo);
			$json += mysqli_fetch_assoc($resTipo);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_articulo = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
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
			$this->fechaInsercion = date("Y-m-d H:i:s");
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
				'$this->status', '$this->fechaInsercion', '$this->id_tipo', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM BIBLIOGRAFICO WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_bibliografico) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
		}

		public function eliminar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$delete = "DELETE FROM BIBLIOGRAFICO WHERE id='$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $delete)){
				echo 'Produccion Eliminada';
			}
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE BIBLIOGRAFICO SET status = true WHERE id = '$id' AND nomArticulo='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
			
		}

		public function actualizar($id_pub ,$nombrePub, $nombreRevista, $noPaginas, $isbn, $fechaPublicacion, $editorial, $id_tipo_biblio){
			$aux = new Conexion;
			$conn = $aux->conexion();

			$update = "UPDATE BIBLIOGRAFICO SET nomArticulo = '$nombrePub', nombreRevista = '$nombreRevista', editorial = '$editorial',
			noPaginas = '$noPaginas', isbn = '$isbn', fechaPublicacion = '$fechaPublicacion', id_tipo_biblio = '$id_tipo_biblio' WHERE id = '$id_pub'";

			if(mysqli_query($conn, $update)) {
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_bibliografico = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_bibliografico) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}

			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM BIBLIOGRAFICO WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);

			$selectTipo = "SELECT * FROM TIPO_BIBLIOGRAFICO WHERE id = '".$json["id_tipo_biblio"]."'";
			$resTipo = mysqli_query($conn, $selectTipo);
			$json += mysqli_fetch_assoc($resTipo);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_bibliografico = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
		}
	}


	class Informe_Tecnico extends Prod_Academica{
		private $nomPub;
		private $dependencia;

		public function __construct(){

		}

		public function crear($nombrePub, $dependencia, $fechaPublicacion, $id_academico){
			$this->fechaInsercion = date("Y-m-d H:i:s");
			$this->nomPub = $nombrePub;
			$this->dependencia = $dependencia;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO INFORME_TECNICO(nomPub, dependencia, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->dependencia', '$this->fechaPublicacion', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM INFORME_TECNICO WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_informe) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE INFORME_TECNICO SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $dependencia, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE INFORME_TECNICO SET nomPub = '$nomPub', dependencia = '$dependencia', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_informe = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_informe) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM INFORME_TECNICO WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_informe = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
		}

	}

	class Prod_Innovadora extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->fechaInsercion = date("Y-m-d H:i:s");
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO PROD_INNOVADORA(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM PROD_INNOVADORA WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_prod_inn) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROD_INNOVADORA SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROD_INNOVADORA SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_prod_inn = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_prod_inn) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM PROD_INNOVADORA WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_prod_inn = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
		}

	}

	class Manual_Operacion extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->fechaInsercion = date("Y-m-d H:i:s");
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO MANUAL_OPERACION(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM MANUAL_OPERACION WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_manual) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE MANUAL_OPERACION SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM MANUAL_OPERACION WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_manual = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE MANUAL_OPERACION SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_manual = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_manual) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

	}

	class Prototipo extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fechaPublicacion, $id_academico){
			$this->fechaInsercion = date("Y-m-d H:i:s");
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->status = false;
			$this->id_academico = $id_academico;
			$aux = new Conexion;
			$conn = $aux->conexion();

			$insert = "INSERT INTO PROTOTIPO(nomPub, noRegistro, fechaPublicacion, status, fechaInsercion, id_academico)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fechaPublicacion', '$this->status', '$this->fechaInsercion', '$this->id_academico')";
			
			if(mysqli_query($conn, $insert)){
				//Toma de la publicación actual el ID para hacer la relación con los colaboradores
				$select = "SELECT id FROM PROTOTIPO WHERE id_academico = '$this->id_academico' AND fechaInsercion = '$this->fechaInsercion'";
				$resultado = mysqli_query($conn, $select);
				$resul = mysqli_fetch_assoc($resultado);
				$id = $resul["id"];

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_prototipo) VALUES('$nomColaborador', '$id')";
							mysqli_query($conn, $sql);
						}
					}
				}
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
			mysqli_close($conn);
		}

		public function aceptar($id_academico, $nom, $id){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROTOTIPO SET status=true WHERE id='$id' AND nomPub='$nom' AND id_academico = '$id_academico'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion aceptada';
			}
			mysqli_close($conn);
		}

		public function actualizar($id_pub, $nomPub, $noRegistro, $fechaPublicacion){
			$aux = new Conexion;
			$conn = $aux->conexion();
			$update = "UPDATE PROTOTIPO SET nomPub = '$nomPub', noRegistro = '$noRegistro', fechaPublicacion = '$fechaPublicacion' WHERE id='$id_pub'";
			if(mysqli_query($conn, $update)){
				echo 'Produccion Actualizada';
				$delete = "DELETE FROM COLABORADOR WHERE id_prototipo = '$id_pub'";
				mysqli_query($conn, $delete);

				$number = count($_POST["colaborador"]);
				if($number > 1) {
					for($i = 0; $i < $number; $i++) {
						if(trim($_POST["colaborador"][$i] != '')){
							$nomColaborador = $_POST["colaborador"][$i];
							$sql = "INSERT INTO COLABORADOR(nomColaborador, id_prototipo) VALUES('$nomColaborador', '$id_pub')";
							mysqli_query($conn, $sql);
						}
					}
				}
			}
			mysqli_close($conn);
		}

		public function mostrar($id_pub){
			$json = array();
			$aux = new Conexion;
			$conn = $aux->conexion();
			if(!$conn){
				echo "Conexion fallida";
				return;
			}
			$select = "SELECT * FROM PROTOTIPO WHERE id = '$id_pub'";
			$resultado = mysqli_query($conn, $select);
			$json = mysqli_fetch_assoc($resultado);
			
			$selectColaboradores = "SELECT nomColaborador FROM COLABORADOR WHERE id_prototipo = '".$json["id"]."' ";
			$resultCol = mysqli_query($conn, $selectColaboradores);
			$jsonCol = array();
			$i = 0;
			while($in = mysqli_fetch_assoc($resultCol)){
				$jsonCol[$i] = $in;
				$i++;
			}
			$json += array("COLABORADOR" => $jsonCol);
			mysqli_close($conn);

			echo json_encode($json);
		}

	}

?>