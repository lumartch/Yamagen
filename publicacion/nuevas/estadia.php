<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomEstadia, usrname FROM ESTADIA WHERE status = true ORDER BY id DESC LIMIT 5";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomEstadia']."_".$row['usrname']."_estadia";
		echo '<li><input value="'.$row['nomEstadia'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/></li>';
	}
	echo '</ul>';
?>