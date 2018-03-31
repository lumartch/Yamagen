<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomInvestigacion, usrname FROM LIN_INNOVADORA WHERE status = false";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomInvestigacion']."_linInnov";
		echo '
			<li>
				<table>
				<tr>
				<th><input value="'.$row['nomInvestigacion'].'" disabled="true" type="text"/></th>
						<th>
						<form action="/publicacion/pendiente/aceptar_publicacion.php" method="post">
							<button id="boton" name="boton"  value="'.$data.'" type="submit">Aceptar publicación</button>
						</form>
						<form action="" method="post">
							<button id="boton" name="boton"  value="'.$data.'" type="submit">Cancelar publicación</button>
						</form>
						<form action="" method="post">
							<button id="boton" name="boton"  value="'.$data.'" type="submit">Ver</button>
						</form>
						</th>
				</tr>
				</table>
			</li>
			';
	}
	echo '</ul>';
?>