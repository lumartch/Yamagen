<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT * FROM PROY_INVESTIGACION WHERE status = true ORDER BY id DESC LIMIT 5";
	$resultado= mysqli_query($conn, $select);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$id_academico = $row['id_academico'];
		$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
		$res_AC = mysqli_query($conn, $select_AC);
		$resul = mysqli_fetch_assoc($res_AC); 
		$data = $row['id']."_".$row['nomProyecto']."_".$row['id_academicotrue']."_proInv";
		echo '<li><input value="'.$row['nomProyecto'].' del academico '.$resul['nombre'].' '.$resul['apellidos'].'" disabled="true" type="text"/></li>';
	}
	echo '</ul>';
	mysqli_close($conn);
?>