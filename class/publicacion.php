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
			$insert = "INSERT INTO LIN_INNOVADORA (nomInvestigacion, usrname, nombre, apellidos, status) 
			VALUES ('$this->nomInvestigacion','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
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
			$insert = "INSERT INTO DIRECCION(nomDireccion, fechaIni, fechaFin, nomEmpresa, nombreAlumno, usrname, nombre, apellidos, status)
			VALUES ('$this->nomDireccion', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
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
			$insert = "INSERT INTO ESTADIA(nomEstadia, fechaIni, fechaFin, nomEmpresa, nombreAlumno, usrname, nombre, apellidos, status)
			VALUES ('$this->nomEstadia', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->nomAlumno','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
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
			$insert = "INSERT INTO PROY_INVESTIGACION(nomProyecto, fechaIni, fechaFin, nomEmpresa, usrname, nombre, apellidos, status)
			VALUES ('$this->nomProyecto', '$this->fechaIni', '$this->fechaFin','$this->nomEmpresa', '$this->username','$this->nombre','$this->apellidos', '$this->status')";
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}
	}

	class Prod_Academica extends Producto_Status{
		private $fecha;
		public function __construct(){

		}
	}

	class Articulo extends Prod_Academica{
		private $nomArticulo;
		private $nombreRevista;
		private $noPaginas;
		private $isbn;

		public function __construct(){

		}

		public function crear($nombrePub, $nombreRevista, $noPaginas, $isbn, $fecha, $username, $nombre, $apellidos){
			$this->nomArticulo = $nombrePub;
			$this->fecha = $fecha;
			$this->nombreRevista = $nombreRevista;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;


			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO ARTICULO(nomArticulo, nombreRevista, noPaginas, isbn, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->noPaginas','$this->isbn', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
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
		public function __construct(){

		}

		public function crear($nombrePub, $nombreRevista, $editorial, $noPaginas, $isbn, $fecha, $username, $nombre, $apellidos){
			$this->nomArticulo = $nombrePub;
			$this->fecha = $fecha;
			$this->nombreRevista = $nombreRevista;
			$this->editorial = $editorial;
			$this->noPaginas = $noPaginas;
			$this->isbn = $isbn;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;


			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO BIBLIOGRAFICO(nomArticulo, nombreRevista, editorial, noPaginas, isbn, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomArticulo', '$this->nombreRevista', '$this->editorial','$this->noPaginas','$this->isbn', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}
	}


	class Informe_Tecnico extends Prod_Academica{
		private $nomPub;
		private $dependencia;

		public function __construct(){

		}

		public function crear($nombrePub, $dependencia, $fecha, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->dependencia = $dependencia;
			$this->fecha = $fecha;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO INFORME_TECNICO(nomPub, dependencia, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomPub', '$this->dependencia', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

	}

	class Prod_Innovadora extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fecha, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fecha = $fecha;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO PROD_INNOVADORA(nomPub, noRegistro, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

	}

	class Manual_Operacion extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fecha, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fecha = $fecha;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO MANUAL_OPERACION(nomPub, noRegistro, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

	}

	class Prototipo extends Prod_Academica{
		private $nomPub;
		private $noRegistro;

		public function __construct(){

		}

		public function crear($nombrePub, $noRegistro, $fecha, $username, $nombre, $apellidos){
			$this->nomPub = $nombrePub;
			$this->noRegistro = $noRegistro;
			$this->fecha = $fecha;
			$this->username = $username;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->status = false;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");

			$insert = "INSERT INTO PROTOTIPO(nomPub, noRegistro, fecha, usrname, nombre, apellidos, status)
			VALUES ('$this->nomPub', '$this->noRegistro', '$this->fecha','$this->username','$this->nombre','$this->apellidos', '$this->status')";
			
			if(mysqli_query($conn, $insert)){
				echo 'Se ha realizado una insercion';
			}
			else{
				echo "No se pudo";
			}
			mysqli_close($conn);
		}

	}

?>