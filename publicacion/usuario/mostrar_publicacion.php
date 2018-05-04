<?php
	$info = $_GET['info'];
	$tipo = $_GET['tipo'];
	if($tipo == 1){
		echo '
			<section id="banner">
				<h1>Línea innovadora de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
				<table>
					<tr>
						<td><input id="nombre" name="nombre" type="text" placeholder="Línea innovadora de investigación..." disabled></input></td>
						<td>
							<table id="colaboradoresTable">
								<tr> <th>Colaboradores </th> </tr>
								<tbody id="colBody"> </tbody>
							</table>
						</td>
					</tr>
				</table>
			</section>
			';
	}
	else if($tipo == 2){
		echo'
			<section id="banner">
				<h1>Artículo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Artículo"  disabled></input></th>
						<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista"  disabled></input></th>
					</tr>
					<tr>
						<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" disabled></input></th>
						<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
					</tr>
					<tr>
						<th>
							<input id="tipoArticulo" name="tipoArticulo" type="text" placeholder="Tipo" disabled></input>
						</th>
					</tr>
					<tr>
						<th><table id="colaboradoresTable">
								<tr> <th>Colaboradores </th> </tr>
								<tbody id="colBody"> </tbody>
							</table>
						</th>
					</tr>
				</table>
			</section>
		';
	}
	else if($tipo == 3){
		echo'
			<section id="banner">
				<h1>Bibliografico</h1>
			</section>
			<section>
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" required></input></th>
							<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista" required></input></th>
						</tr>
						<tr>
							<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" required></input></th>
							<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" required></input></th>
						</tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
						<tr>
							<th><input id="editorial" name="editorial" type="text" placeholder="Editorial" required></input></th>
							<th>
								<input id="tipoBibliografico" name="tipoBibliografico" type="text" placeholder="Tipo" disabled></input>
							</th>
						</tr>
						<tr>
							<th>
								<table id="colaboradoresTable">
									<tr> <th>Colaboradores </th> </tr>
									<tbody id="colBody"> </tbody>
								</table>
							</th>
						</tr>
					</table>
			</section>
		';

	}/*
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
	}*/
?>

<script>
	$( document ).ready(function() {
		var tipo = "<?php echo $tipo; ?>";
		var id = "<?php echo $info; ?>";
		var row = "";
		if(tipo == 1){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {					
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomInvestigacion"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 2){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomArticulo"]);
					$("#nomRev").val(datos["nombreRevista"]);
					$("#noPag").val(datos["noPaginas"]);
					$("#isbn").val(datos["isbn"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$("#tipoArticulo").val(datos["tipo"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 3){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomArticulo"]);
					$("#nomRev").val(datos["nombreRevista"]);
					$("#noPag").val(datos["noPaginas"]);
					$("#isbn").val(datos["isbn"]);
					$("#editorial").val(datos["editorial"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$("#tipoBibliografico").val(datos["tipo"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
	});
</script>