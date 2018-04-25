<?php
	session_start();
	$id_academico = $_SESSION['id_academico'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");

	$select = "SELECT id, nomEstadia, id_academico FROM ESTADIA WHERE id_academico = '$id_academico'";
	$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
	$resultado= mysqli_query($conn, $select);
	$res_AC = mysqli_query($conn, $select_AC);
	$resul = mysqli_fetch_assoc($res_AC);
	
	mysqli_close($conn);
	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomEstadia']."_".$row['id_academico']."_estadia";
		echo '
			<li>
				<input value="'.$row['nomEstadia'].' del academico '.$resul['nombre'].' '.$resul["apellidos"].'" disabled="true" type="text"/>
				
				<form action="/publicacion/usuario/eliminar_publicacion.php" method="post" id="elForm"></form>
				<form action="#" method="post" id="verForm"></form>

				<table>
					<tr>
						<button id="eliminar" name="eliminar" value="'.$data.'" form="elForm">Eliminar</button>

						<button id="ver" name="ver" value="veTODO" form="verForm">Editar</button>
						<button id="ver" name="ver" value="veTODO" form="verForm">Ver</button>
					</tr>
				</table>
			</li>';
	}
	echo '</ul>';
?>