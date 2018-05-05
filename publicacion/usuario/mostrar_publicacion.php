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
							<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" disabled></input></th>
							<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista" disabled></input></th>
						</tr>
						<tr>
							<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" disabled></input></th>
							<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" disabled></input></th>
						</tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
						</tr>
						<tr>
						<tr>
							<th><input id="editorial" name="editorial" type="text" placeholder="Editorial" disabled></input></th>
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

	}
	else if($tipo == 4){
		echo'
			<section id="banner">
				<h1>Informe técnico</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" disabled></input></th>
						<th><input id="nomDep" name="nomDep" type="text" placeholder="Dependencia" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
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
	else if($tipo == 5){
		echo'
			<section id="banner">
				<h1>Manual de operación</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
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
	else if($tipo == 6){
		echo'
			<section id="banner">
				<h1>Productividad innovadora</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Productividad" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
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
	else if($tipo == 7){
		echo'
			<section id="banner">
				<h1>Prototipo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Productividad" disabled></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" disabled></input></th>
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
	else if($tipo == 8){
		echo '
			<section id="banner">
				<h1>Proyectos de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" disabled></input></th>
						<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de inicio</th>
						<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha final</th>
						<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" disabled></input></th>
					</tr>
					<tr>
						<th><table id="colaboradoresTable">
								<tr> <th>Colaboradores </th> </tr>
								<tbody id="colBody"> </tbody>
							</table>

						</th>
						<th><table id="institucionTable">
								<tr> <th> Instituciones </th> </tr>
								<tbody id="instBody"> </tbody>
							</table>
						</th>
					</tr>
				</table>
			</section>
		';
	}
	else if($tipo == 9){
		echo '
			<section id="banner">
				<h1>Dirección individualizada</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" disabled></input></th>
						<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de inicio</th>
						<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha final</th>
						<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" disabled></input></th>
					</tr>
					<tr>
						<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" disabled></input></th>
					</tr>
					<tr>
						<th><table id="colaboradoresTable">
								<tr> <th>Colaboradores </th> </tr>
								<tbody id="colBody"> </tbody>
							</table>
						</th>
					</tr>
				</table>
				<input type="hidden" id="publicacion" name="publicacion" value="direccion"></input>
			</section>
		';

	}
	else if($tipo == 10){
		echo '
			<section id="banner">
				<h1>Estadía en empresas</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Estadia..." disabled></input></th>
						<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha de inicio</th>
						<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" disabled></input></th>
					</tr>
					<tr>
						<th>Fecha final</th>
						<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" disabled></input></th>
					</tr>
					<tr>
						<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" disabled></input></th>
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
?>

<script>
	$( document ).ready(function() {
		var tipo = "<?php echo $tipo; ?>";
		var id = "<?php echo $info; ?>";
		var row = "";
		var rowI = "";
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
		else if( tipo == 4){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomPub"]);
					$("#nomDep").val(datos["dependencia"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 5){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomPub"]);
					$("#noReg").val(datos["noRegistro"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 6){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomPub"]);
					$("#noReg").val(datos["noRegistro"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 7){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomPub"]);
					$("#noReg").val(datos["noRegistro"]);
					$("#fecha").val(datos["fechaPublicacion"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 8){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomProyecto"]);
					$("#empresa").val(datos["nomEmpresa"]);
					$("#fechaIni").val(datos["fechaIni"]);
					$("#fechaFin").val(datos["fechaFin"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					
					$('#colBody').append(row)

					$.each(datos['INSTITUCION'], function(index, valor){
							rowI += valor['nomInstitucion'] + '</br>'
						});
					$('#instBody').append(rowI)
				}
			});
		}
		else if( tipo == 9){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomDireccion"]);
					$("#empresa").val(datos["nomEmpresa"]);
					$("#alumno").val(datos["nombreAlumno"]);
					$("#fechaIni").val(datos["fechaIni"]);
					$("#fechaFin").val(datos["fechaFin"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
		else if( tipo == 10){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomEstadia"]);
					$("#empresa").val(datos["nomEmpresa"]);
					$("#alumno").val(datos["nombreAlumno"]);
					$("#fechaIni").val(datos["fechaIni"]);
					$("#fechaFin").val(datos["fechaFin"]);
					$.each(datos['COLABORADOR'], function(ind, val){
							row += val['nomColaborador'] + '</br>'
						});
					$('#colBody').append(row)
				}
			});
		}
	});
</script>