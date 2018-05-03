<?php
	session_start();
	$id_academico = $_SESSION['id_academico'];
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();
	$select = "SELECT id, nomInvestigacion, id_academico FROM LIN_INNOVADORA WHERE id_academico = '$id_academico'";
	$select_AC = "SELECT nombre, apellidos FROM ACADEMICO WHERE id = '$id_academico'";
	$resultado= mysqli_query($conn, $select);
	$res_AC = mysqli_query($conn, $select_AC);
	$resul = mysqli_fetch_assoc($res_AC);
	
	mysqli_close($conn);


	echo '<ul>';
	$data = "";
	$i = 1;
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomInvestigacion']."_".$row['id_academico']."_linInnov";
		$tipo = "linnInnov";
		echo "
			<li>
				<input value='".$row["nomInvestigacion"]." del academico ".$resul["nombre"]." ".$resul["apellidos"]."' disabled='true' type='text'/>
				
				<form action='/publicacion/usuario/eliminar_publicacion.php' method='post' id='elForm'></form>

				<table>
					<tr>
						<button id='eliminar' name='eliminar' value='".$data."' form='elForm'>Eliminar</button>
						<button id=\"modificar'.$i.'\" type=\"button\" name=\"modificar'.$i.'\" onclick='modificarDatos(".$row["id"].", 1)'>Modificar</button>
						<button id=\"ver'.$i.'\" type=\"button\" name=\"ver'.$i.'\" onclick='verDatos(".$row["id"].", 1)'>Ver</button>
					</tr>
				</table>
			</li>";
			$i++;
	}
	echo '</ul>';
?>