<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	
	$info = $_GET['info'];
	$tipo = $_GET['tipo'];
	
	if($tipo == 1){
		echo '
			<section id="banner">
				<h1>Línea innovadora de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table class="d">
						<tr>
							<td><input id="nombre" name="nombre" type="text" placeholder="Línea innovadora de investigación..." required></input></td>
							<td>
								<input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<table id="colaboradoresTable" class="d">
								</table>
							</td>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>';
	}
	else if($tipo == 2){
		echo'
			<section id="banner">
				<h1>Artículo</h1>
			</section>

			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" required></input></th>
							<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista" required></input></th>
						</tr>
						<tr>
							<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" required></input></th>
							<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" required></input></th>
						</tr>
						<tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
							<th><select id="tipo_articulo" name="tipo_articulo" required>
									<option value="1">Articulo de difusión y divulgación</option>
									<option value="2">Articulo arbitrado</option>
									<option value="3">Articulo en revista indexada</option>
								</select>
							</th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>

			<input id="submit" type="submit" value="Actualizar"></input>
		';
	}
	else if($tipo == 3){
		echo'
			<section id="banner">
				<h1>Bibliografico</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
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
							<th><select id="tipo_bibliografico" name="tipo_bibliografico" required>
									<option value="1">Libro</option>
									<option value="2">Memorias</option>
								</select>
							</th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';

	}
	else if($tipo == 4){
		echo'
			<section id="banner">
				<h1>Informe técnico</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Informe" required></input></th>
							<th><input id="nomDep" name="nomDep" type="text" placeholder="Dependencia" required></input></th>
						</tr>
						<tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';
	}
	else if($tipo == 5){
		echo'
			<section id="banner">
				<h1>Manual de operación</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Manual" required></input></th>
							<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" required></input></th>
						</tr>
						<tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table></th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';
	}
	else if($tipo == 6){
		echo'
			<section id="banner">
				<h1>Productividad innovadora</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Productividad" required></input></th>
							<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" required></input></th>
						</tr>
						<tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table></th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';
	}
	else if($tipo == 7){
		echo'
			<section id="banner">
				<h1>Prototipo</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Productividad" required></input></th>
							<th><input id="noReg" name="noReg" type="text" placeholder="No.Registro" required></input></th>
						</tr>
						<tr>
							<th>Fecha de registro</th>
							<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table></th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';
	}
	else if($tipo == 8){
		echo '
			<section id="banner">
				<h1>Proyectos de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
							<th><input id="institucion" name="institucion[]" type="text" placeholder="Institución beneficiada" class="form-control name_list"></input>
								<input type="button" name="agregarInst" id="agregarInst" value="Agregar"></input>					
								<table id="institucionTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>
		';
		
	}
	else if($tipo == 9){
		echo '
			<section id="banner">
				<h1>Dirección individualizada</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" required></input></th>
						</tr>
						<tr>
							<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>

		';

	}
	else if($tipo == 10){
		echo '
			<section id="banner">
				<h1>Estadía en empresas</h1>
			</section>
			<section>
				<form id="formulario" name="formulario">
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Estadia..." required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" required></input></th>
						</tr>
						<tr>
							<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list"></input>
								<input type="button" name="agregar" id="agregar" value="Agregar"></input>					
								<table id="colaboradoresTable" class="d">
								</table>
							</th>
						</tr>
					</table>
					<input type="hidden" id="info" name="info" value="'.$info.'"></input>
					<input type="hidden" id="tipo" name="tipo" value="'.$tipo.'"></input>
				</form>
			</section>
			<input id="submit" type="submit" value="Actualizar"></input>

		';
		mysqli_close($conn);
	}
	else {
		echo "nope";
	}
?>


<script>
	var i = 1;
	$( document ).ready(function() {
		var tipo = "<?php echo $tipo; ?>";
		var id = "<?php echo $info; ?>";
		if(tipo == 1){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					
					var datos = JSON.parse(data)
					$("#nombre").val(datos["nomInvestigacion"]);

					$.each(datos['COLABORADOR'], function(ind, val){
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						if($("#nombre").val() == ""){
							alert("Ingrese un valor del nombre de la linea innovadora.");f
							return;
						}		
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}
		else if(tipo == 2){
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

					$.each(datos['COLABORADOR'], function(ind, val){
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						if($("#nombre").val() == ""  || $("#nomRev").val() == ""  || $("#isbn").val() == "" || $("#noPag").val() == "" || $("#fecha").val() == null){
							alert("Los campos deben estar llenos.");f
							return;
						}		
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}
		else if(tipo == 3){
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

					$.each(datos['COLABORADOR'], function(ind, val){
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						if($("#nombre").val() == ""  || $("#nomRev").val() == ""  || $("#isbn").val() == "" || $("#noPag").val() == "" || $("#fecha").val() == null || $("#editorial").val() == ""){
							alert("Los campos deben estar llenos.");f
							return;
						}		
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}

		else if(tipo == 4){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fecha').value;
						if($("#nombre").val() == ""  || $("#nomDep").val() == "" || !valueDate){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}
		else if(tipo == 5){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fecha').value;
						if($("#nombre").val() == ""  || $("#noReg").val() == "" || !valueDate){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}
		else if(tipo == 6){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fecha').value;
						if($("#nombre").val() == ""  || $("#noReg").val() == "" || !valueDate){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}
		else if(tipo == 7){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fecha').value;
						if($("#nombre").val() == ""  || $("#noReg").val() == "" || !valueDate){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}

		else if(tipo == 8){
			$.ajax({
				url:"/publicacion/mostrar.php",
				method:"POST",
				data: { id : id, tipo : tipo },
				success:function(data) {
					var datos = JSON.parse(data)
					console.log(data);
					$("#nombre").val(datos["nomProyecto"]);
					$("#empresa").val(datos["nomEmpresa"]);
					$("#fechaIni").val(datos["fechaIni"]);
					$("#fechaFin").val(datos["fechaFin"]);

					$.each(datos['COLABORADOR'], function(ind, val){
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$.each(datos['INSTITUCION'], function(ind, valor){
						$('#institucionTable').append('<tr id="row'+ j +'"><td><input id="institucion" name="institucion[]" type="text" placeholder="Institución beneficiada... " class="form-control name_list" value= "'+ valor['nomInstitucion'] + '"></input></td><td><input type="button" name="remove" id="'+j+'" class="btn_removeI" value="X"></input></td></tr>');
						j++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fechaIni').value;
						var valueDate1 = document.getElementById('fechaFin').value;
						if($("#nombre").val() == ""  || $("#empresa").val() == ""  || !valueDate || !valueDate1){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}



		else if(tipo == 9){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fechaIni').value;
						var valueDate1 = document.getElementById('fechaFin').value;
						if($("#nombre").val() == ""  || $("#empresa").val() == ""  || $("#alumno").val() == "" || !valueDate || !valueDate1){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								//alert(data);
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}

		else if(tipo == 10){
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
						$('#colaboradoresTable').append('<tr id="row'+ i +'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+ val['nomColaborador'] + '"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
						i++;
					});

					$('#submit').click(function(){
						var valueDate = document.getElementById('fechaIni').value;
						var valueDate1 = document.getElementById('fechaFin').value;
						if($("#nombre").val() == ""  || $("#empresa").val() == ""  || $("#alumno").val() == "" || !valueDate || !valueDate1){
							alert("Los campos deben estar llenos.");
							return;
						}	
						$.ajax({
							url:"/publicacion/usuario/mod.php",
							method:"POST",
							data: $('#formulario').serialize() ,
							success:function(data) {
								alert("¡Publicación actualizada!");
								$("#contInfo").load("/publicacion/usuario/pub_user.html");
							}
						});
					});
				}
			});
		}

	});

	
	$('#agregar').click(function(){
		var colaborador = $("#colaborador").val();
		i++;
		$('#colaboradoresTable').append('<tr id="row'+i+'"><td><input id="colaborador" name="colaborador[]" type="text" placeholder="Colaborador(es)" class="form-control name_list" value= "'+colaborador+'"></input></td><td><input type="button" name="remove" id="'+i+'" class="btn_remove" value="X"></input></td></tr>');
		$("#colaborador").val("");
	});

	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row' + button_id + '').remove();
	});

	var j = 1;
	$('#agregarInst').click(function(){
		var institucion = $("#institucion").val();
		j++;
		$('#institucionTable').append('<tr id="rowI'+j+'"><td><input id="institucion" name="institucion[]" type="text" placeholder="Institución beneficiada" class="form-control name_list" value= "'+institucion+'"></input></td><td><input type="button" name="remove" id="'+j+'" class="btn_removeI" value="X"></input></td></tr>');
		$("#institucion").val("");
	});

	$(document).on('click', '.btn_removeI', function(){
		var button_id = $(this).attr("id"); 
		$('#rowI' + button_id + '').remove();
	})
</script>