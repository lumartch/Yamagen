<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	//include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	
	$info = $_GET['info'];
	$tipo = $_GET['tipo'];
	if($tipo == 1){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM LIN_INNOVADORA WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);

		echo '
			<section id="banner">
				<h1>Línea innovadora de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
					<div>
						<table>
							<tr><input id="nombre" name="nombre" type="text" placeholder="Linea de investigacion" value="'.$row["nomInvestigacion"].'" disabled></input></tr>
							<tr><input id="colaborador" name="colaborador" type="text" placeholder="Colaboradores" disabled></input></tr>
						</table>
					</div>
			</section>
			';
		mysqli_close($conn);
	}
	else if($tipo == 2){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM ARTICULO WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		$id_tipo = $row["id_tipo_articulo"];

		$select_Tipo = "SELECT * FROM TIPO_ARTICULO WHERE id = '$id_tipo'";
		$res = mysqli_query($conn, $select_Tipo);
		$rowTipo = mysqli_fetch_assoc($res);
		echo'
			<section id="banner">
				<h1>Artículo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" value="'.$row["nomArticulo"].'" disabled></input></th>
						<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista"  value="'.$row["nombreRevista"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" value="'.$row["noPaginas"].'" disabled></input></th>
						<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" value="'.$row["isbn"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th>
							<input id="tipoArticulo" name="tipoArticulo" type="text" placeholder="Tipo" value="'.$rowTipo["tipo"].'" disabled></input>
						</th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 3){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM BIBLIOGRAFICO WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);

		$id_tipo = $row["id_tipo_biblio"];

		$select_Tipo = "SELECT * FROM TIPO_BIBLIOGRAFICO WHERE id = '$id_tipo'";
		$res = mysqli_query($conn, $select_Tipo);
		$rowTipo = mysqli_fetch_assoc($res);
		echo'
			<section id="banner">
				<h1>Bibliografico</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" value="'.$row["nomArticulo"].'" disabled></input></th>
						<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista"  value="'.$row["nombreRevista"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" value="'.$row["noPaginas"].'" disabled></input></th>
						<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" value="'.$row["isbn"].'" disabled></input></th>
					</tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
					<tr>
						<th><input id="editorial" name="editorial" type="text" placeholder="Editorial"  value="'.$row["editorial"].'" disabled></input></th>
						<th>
							<input id="tipoArticulo" name="tipoArticulo" type="text" placeholder="Tipo" value="'.$rowTipo["tipo"].'" disabled></input>
						</th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);

	}
	else if($tipo == 4){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM INFORME_TECNICO WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo'
			<section id="banner">
				<h1>Informe técnico</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" disabled></input></th>
						<th><input id="nomDep" name="nomDep" type="text" placeholder="Dependencia" value="'.$row["dependencia"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 5){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM MANUAL_OPERACION WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo'
			<section id="banner">
				<h1>Manual de operación</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 6){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM PROD_INNOVADORA WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo'
			<section id="banner">
				<h1>Productividad innovadora</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 7){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM PROTOTIPO WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo '
			<section id="banner">
				<h1>Prototipo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 8){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM PROY_INVESTIGACION WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo '
			<section id="banner">
				<h1>Prototipo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" disabled></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
					</tr>
				</table>
			</section>
		';
		mysqli_close($conn);
	}
	else if($tipo == 9){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM PROY_INVESTIGACION WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		mysqli_close($conn);
		echo '
			<section id="banner">
				<h1>Proyectos de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
				<form action="/publicacion/usuario/crear_publicacion.php" method="post">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" value="'.$row["nomProyecto"].'" disabled></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" value="'.$row["nomEmpresa"].'" disabled></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" value="'.$row["fechaIni"].'" disabled></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" value="'.$row["fechaFin"].'" disabled></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
							<th><input id="instituciones" name="instituciones" type="text" placeholder="Instituciones beneficiadas"></input></th>
						</tr>
					</table>
			</section>
		';
	}
	else if($tipo == 10){
		$aux = new Conexion;
		$conn = $aux->conexion();
		if(!$conn){
			echo "Conexion fallida";
			return;
		}
		$select = "SELECT * FROM ESTADIA WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		echo '
			<section id="banner">
				<h1>Estadía en empresas</h1>
			</section>
			<section>
				<form action="/publicacion/usuario/crear_publicacion.php" method="post">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" value="'.$row["nomProyecto"].'" disabled></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" value="'.$row["nomEmpresa"].'" disabled></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" value="'.$row["fechaIni"].'" disabled></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" value="'.$row["fechaFin"].'" disabled></input></th>
						</tr>
						<tr>
							<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" value="'.$row["nombreAlumno"].'" disabled></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador" type="text" placeholder="colaboradores"></input></th>
						</tr>
					</table>
			</section>
		';
		mysqli_close($conn);
	}
?>