<?php
	session_start();
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost", "root", "", "Yamagen");
	$select = "SELECT id, nomInvestigacion, usrname FROM LIN_INNOVADORA WHERE usrname = '$username'";

	$resultado= mysqli_query($conn, $select);
	mysqli_close($conn);

	echo '<ul>';
	$data = "";
	while($row = mysqli_fetch_assoc($resultado)) {
		$data = $row['id']."_".$row['nomInvestigacion']."_".$row['usrname']."_linInnov";
		echo '
			<li>
				<input value="'.$row['nomInvestigacion'].' del usuario '.$row['usrname'].'" disabled="true" type="text"/>
				
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