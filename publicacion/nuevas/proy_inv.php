<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomProyecto, usrname FROM PROY_INVESTIGACION WHERE status = true ORDER BY id DESC LIMIT 5";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomProyecto']."_".$row['usrname']."_proInv";
		echo '<li><input value="'.$row['nomProyecto'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/></li>';
	}
	echo '</ul>';
?>