<?php
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomPub, usrname FROM PROD_INNOVADORA  WHERE status = true ORDER BY id DESC LIMIT 5";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomPub']."_".$row['usrname']."_prodInnov";
		echo '<li><input value="'.$row['nomPub'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/></li>';
	}
	echo '</ul>';
?>