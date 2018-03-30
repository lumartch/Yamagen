<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
	/*$select = "SELECT linea FROM LINEA_INVESTIGACION WHERE linea LIKE '%a%'";
	$resultado = mysqli_query($conn, $select);
	mysqli_close($conn);
	while($row = mysqli_fetch_assoc($resultado)){

		echo $row["linea"];
	} */

	if(isset($_POST["referencia"])){
		//$return_arr = array();

        $term = $_POST["referencia"];

        $select = "SELECT linea FROM LINEA_INVESTIGACION WHERE linea LIKE '%$term%'";
        echo $select;
		/*$resultado = mysqli_query($conn, $select);
		mysqli_close($conn);
		
        while($row = mysqli_fetch_assoc($resultado)){
        	$return_arr[] =  $row["linea"];
		}

		echo json_encode($return_arr);*/
	}
?>