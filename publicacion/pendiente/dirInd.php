<?php
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomDireccion, usrname FROM DIRECCION WHERE status = false";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomDireccion']."_".$row['usrname']."_dirInd";
		echo '
			<li>
				<input value="'.$row['nomDireccion'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/>
				<form action="/publicacion/pendiente/aceptar_publicacion.php" method="post" id="aceptar"></form>
				<form action="" method="post"></form>
				<form action="" method="post"></form>
				
				<table>
				<tr>
					<button id="boton" name="boton"  value="'.$data.'" type="submit" form="aceptar">Aceptar publicación</button>
					<button id="boton" name="boton"  value="'.$data.'" type="submit">Cancelar publicación</button>
					<button id="boton" name="boton"  value="'.$data.'" type="submit">Ver</button>
				</tr>
				</table>
			</li>
			';
	}
	echo '</ul>';
?>