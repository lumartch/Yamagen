<?php
	class Linea_Investigacion{
		private $linea;

		public function __construct(){

		}
		public function crear($linea){
			$this->linea = $linea;
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$insert = "INSERT INTO  LINEA_INVESTIGACION (linea) VALUES ('$this->linea')";
			if(mysqli_query($conn, $insert)){
				echo "Nueva linea de investigacion creada.";
			}
			else{
				echo "Error: ". mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		
		public function autocomplementar(){
			$conn = mysqli_connect("localhost", "root", "", "Yamagen");
			$select = "SELECT linea FROM  LINEA_INVESTIGACION";
			$resultado = mysqli_query($conn, $select);
			mysqli_close($conn);
			$return_arr = array();
			if (mysqli_num_rows($resultado) > 0){ 
				while($fila = mysqli_fetch_assoc($resultado)){ 
					$return_arr[] =  $fila['linea'];
				}
			}else{
				echo "No hay resultados.";	
			}
			return json_encode($return_arr);
		}
	}
?>