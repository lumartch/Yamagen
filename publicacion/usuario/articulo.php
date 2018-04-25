<?php
	session_start();
	$id_academico = $_SESSION['id_academico'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomArticulo, id_academico FROM ARTICULO WHERE id_academico = '$id_academico'";
	$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
	$resultado= mysqli_query($conn, $select);
	$res_AC = mysqli_query($conn, $select_AC);
	$resul = mysqli_fetch_assoc($res_AC);

	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomArticulo']."_".$row['id_academico']."_articulo";
		echo '
			<li>
				<input value="'.$row['nomArticulo'].' del academico '.$resul['nombre'].' '.$resul["apellidos"].'" disabled="true" type="text"/>

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