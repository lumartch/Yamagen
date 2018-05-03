<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();

	$select = "SELECT id, nomEstadia, id_academico FROM ESTADIA WHERE status = false";
	$resultado= mysqli_query($conn, $select);


	echo '<ul>';
	$data = "";
	$i = 1;
	while($row = mysqli_fetch_assoc($resultado)) {
		$id_academico = $row["id_academico"];
		$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
		$res_AC = mysqli_query($conn, $select_AC);
		$resul = mysqli_fetch_assoc($res_AC);
		$data = $row['id']."_".$row['nomEstadia']."_".$row['id_academico']."_estadia";
		echo '
			<li>
				<input value="'.$row['nomEstadia'].' del academico '.$resul['nombre'].' '.$resul["apellidos"].'" disabled="true" type="text"/>
				<form action="/publicacion/pendiente/aceptar_publicacion.php" method="post" id="aceptar"></form>
				<form action="/publicacion/pendiente/eliminar_publicacion.php" method="post" id="eliminar"></form>
				
				<table>
				<tr>
					<button id="boton" name="boton"  value="'.$data.'" type="submit" form="aceptar">Aceptar publicación</button>
					<button id="boton" name="boton"  value="'.$data.'" type="submit" form="eliminar">Eliminar publicación</button>
					<button id="ver'.$i.'" type="button" name="ver'.$i.'" onclick="verDatos('.$row["id"].', 10)">Ver</button>
				</tr>
				</table>
			</li>
			';
		$i++;
	}
	echo '</ul>';
	mysqli_close($conn);
?>