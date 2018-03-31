<?php
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");
	$select = "SELECT id, nomInvestigacion, usrname FROM LIN_INNOVADORA WHERE status = true ORDER BY id DESC LIMIT 5";

	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomInvestigacion']."_".$row['usrname']."_linInnov";
		echo '<li><input value="'.$row['nomInvestigacion'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/></li>';
	}
	echo '</ul>';
?>