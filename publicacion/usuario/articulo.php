<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomArticulo, usrname FROM ARTICULO WHERE usrname = '$username'";
	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomArticulo']."_".$row['usrname']."_articulo";
		echo '
			<li>
				<input value="'.$row['nomArticulo'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/>
				
				<form action="/publicacion/usuario/eliminar_publicacion.php" method="post" id="eliminarForm"></form>
				<form action="#" method="post" id="mostrarForm"></form>
				<form action="#" method="post" id="editarForm"></form>

				<table>
					<tr>
						<button id="eliminar" name="eliminar" value="'.$data.'" form="eliminarForm">Eliminar</button>

						<button id="ver" name="ver" value="veTODO" form="mostrarForm">Ver</button>
						<button id="ver" name="ver" value="veTODO" form="editarForm">Editar</button>
					</tr>
				</table>
			</li>';
	}
	echo '</ul>';
?>