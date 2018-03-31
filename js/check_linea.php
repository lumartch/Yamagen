<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
	if(isset($_POST["referencia"])){

        $term = $_POST["referencia"];

        $select = "SELECT linea FROM LINEA_INVESTIGACION WHERE linea LIKE '%$term%'";
        echo $select;
	}
	mysqli_close($conn);
?>