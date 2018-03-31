<?php
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomArticulo, usrname FROM BIBLIOGRAFICO WHERE status = false";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomArticulo']."_".$row['usrname']."_bibliografico";
		echo '
			<li>
				<input value="'.$row['nomArticulo'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/>
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