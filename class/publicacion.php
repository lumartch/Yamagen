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
		private $fechaPub;
		public function __construct(){

		}
	}

	class Articulo extends Prod_Academica{
		private $nombreArticulo;
		private $nombreRevista;
		private $;
		private $;
	}


?>