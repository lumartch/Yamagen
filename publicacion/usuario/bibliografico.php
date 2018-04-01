<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomArticulo, usrname FROM BIBLIOGRAFICO WHERE usrname = '$username'";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomArticulo']."_".$row['usrname']."_bibliografico";
		echo '
			<li>
				<input value="'.$row['nomArticulo'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/>
				<form action="/publicacion/usuario/eliminar_publicacion.php" method="post" id="eliminarForm"></form>
				<form action="/publicacion/usuario/modificar_publicacion.php" method="post" id="modificarForm"></form>
				<form action="/publicacion/usuario/mostrar_publicacion.php" method="post" id="mostrarForm"></form>

				<table>
					<tr>
						<button id="eliminar" name="eliminar" value="'.$data.'" form="eliminarForm">Eliminar</button>
						<button id="modificar" name="modificar" value="modificar" form="modificarForm">Modificar</button>
						<button id="mostrar" name="mostrar" value="mostrar" form="mostrarForm">Mostrar</button>
					</tr>
				</table>
			</li>';
	}
	echo '</ul>';
?>