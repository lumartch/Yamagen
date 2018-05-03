<?php
	session_start();
	$id_academico = $_SESSION['id_academico'];
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();

	$select = "SELECT id, nomProyecto, id_academico FROM PROY_INVESTIGACION WHERE id_academico = '$id_academico'";
	$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
	$resultado= mysqli_query($conn, $select);
	$res_AC = mysqli_query($conn, $select_AC);
	$resul = mysqli_fetch_assoc($res_AC);
	
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	$i = 1;
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomProyecto']."_".$row['id_academico']."_proInv";
		echo '
			<li>
				<input value="'.$row['nomProyecto'].' del academico '.$resul['nombre'].' '.$resul["apellidos"].'" disabled="true" type="text"/>
				
				<form action="/publicacion/usuario/eliminar_publicacion.php" method="post" id="elForm"></form>

				<table>
					<tr>
						<button id="eliminar" name="eliminar" value="'.$data.'" form="elForm">Eliminar</button>
						<button id="modificar'.$i.'" type="button" name="modificar'.$i.'" onclick="modificarDatos('.$row["id"].', 8)">Modificar</button>
						<button id="ver'.$i.'" type="button" name="ver'.$i.'" onclick="verDatos('.$row["id"].', 8)">Ver</button>
					</tr>
				</table>
			</li>';
		$i++;
	}
	echo '</ul>';
?>