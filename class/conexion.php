<?php
	class Conexion {
		function __construct(){

		}
		public function conexion(){
			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			return $conn;
		}
		public function cerrar($conn){
			mysqli_close($conn);
		}

	}

?>