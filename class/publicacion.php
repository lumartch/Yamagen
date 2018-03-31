<?php
	class Producto_Status{
		
		private $username;
		private $nombre;
		private $apellidos;
		private $status;

		public function __construct(){
			$this->status = false;
		}
		public function setStatus($status){
			$this->status = $status;
		}
	}

	class Lin_Innovadora extends Producto_Status{

		private $nomInvestigacion;

		public function __construct(){
			$this->nomInvestigacion = "";
		}

		public function crear($nomInvestigacion, $username, $nombre, $apellidos){
			$this->nomInvestigacion = $nomInvestigacion;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			
			$this->status = false;
			$this->username = $username;
			
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

	class Estadia extends Producto_Status{
		
	}

	class Proy_Investigacion extends Producto_Status{
		
	}

	class Direccion extends Producto_Status{

	}

?>