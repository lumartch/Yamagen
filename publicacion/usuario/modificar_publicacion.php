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
							<th><select id="tipo" name="tipo" required>
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
							<th><select id="tipo" name="tipo" required>
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
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" required></input></th>
						<th><input id="nomDep" name="nomDep" type="text" placeholder="Dependencia" value="'.$row["dependencia"].'" required></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
				function modificarDatos(){
					alert("Modificando publicación...");
					var nombre = document.getElementById("nombre").value;
					var nomDep = document.getElementById("nomDep").value;
					var fecha = document.getElementById("fecha").value;
					window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre + "&nomDep=" + nomDep + "&fecha=" + fecha;
				}
			</script>
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
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" required></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" required></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var noReg = document.getElementById("noReg").value;
				var fecha = document.getElementById("fecha").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre + "&noReg=" + noReg + "&fecha=" + fecha;
			}
			</script>
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
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" required></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" required></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var noReg = document.getElementById("noReg").value;
				var fecha = document.getElementById("fecha").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre + "&noReg=" + noReg + "&fecha=" + fecha;
			}
			</script>
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
						<th><input id="nombre" name="nombre" type="text" placeholder="Informe" value="'.$row["nomPub"].'" required></input></th>
						<th><input id="noReg" name="noReg" type="text" placeholder="Dependencia" value="'.$row["noRegistro"].'" required></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var noReg = document.getElementById("noReg").value;
				var fecha = document.getElementById("fecha").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre + "&noReg=" + noReg + "&fecha=" + fecha;
			}
			</script>
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
				<h1>Proyectos de investigación aplicada y desarrollo tecnológico</h1>
			</section>
			<section>
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" value="'.$row["nomProyecto"].'" required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" value="'.$row["nomEmpresa"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" value="'.$row["fechaIni"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" value="'.$row["fechaFin"].'" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
							<th><input id="instituciones" name="instituciones" type="text" placeholder="Instituciones beneficiadas"></input></th>
						</tr>
					</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var empresa = document.getElementById("empresa").value;
				var fechaIni = document.getElementById("fechaIni").value;
				var fechaFin = document.getElementById("fechaFin").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre 
																	+ "&empresa=" + empresa + "&fechaIni=" + fechaIni + "&fechaFin=" + fechaFin;
			}
			</script>
		';
		mysqli_close($conn);
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
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" value="'.$row["nomEstadia"].'" required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" value="'.$row["nomEmpresa"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" value="'.$row["fechaIni"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" value="'.$row["fechaFin"].'" required></input></th>
						</tr>
						<tr>
							<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" value="'.$row["nombreAlumno"].'" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
						</tr>
					</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var empresa = document.getElementById("empresa").value;
				var fechaIni = document.getElementById("fechaIni").value;
				var fechaFin = document.getElementById("fechaFin").value;
				var alumno = document.getElementById("alumno").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre 
																	+ "&empresa=" + empresa + "&fechaIni=" + fechaIni + "&fechaFin=" + fechaFin + "&alumno=" + alumno;
			}
			</script>
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
		$select = "SELECT * FROM DIRECCION WHERE id = '$info'";
		$resultado = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($resultado);
		mysqli_close($conn);
		echo '
			<section id="banner">
				<h1>Dirección individualizada</h1>
			</section>
			<section>
					<table>
						<tr>
							<th><input id="nombre" name="nombre" type="text" placeholder="Proyecto" value="'.$row["nomDireccion"].'" required></input></th>
							<th><input id="empresa" name="empresa" type="text" placeholder="Empresa" value="'.$row["nomEmpresa"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha de inicio</th>
							<th><input id="fechaIni" name="fechaIni" type="date" placeholder="Fecha Inicio" value="'.$row["fechaIni"].'" required></input></th>
						</tr>
						<tr>
							<th>Fecha final</th>
							<th><input id="fechaFin" name="fechaFin"type="date" placeholder="Fecha fin" value="'.$row["fechaFin"].'" required></input></th>
						</tr>
						<tr>
							<th><input id="alumno" name="alumno" type="text" placeholder="Alumno" value="'.$row["nombreAlumno"].'" required></input></th>
						</tr>
						<tr>
							<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
						</tr>
					</table>
					<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
			function modificarDatos(){
				alert("Modificando publicación...");
				var nombre = document.getElementById("nombre").value;
				var empresa = document.getElementById("empresa").value;
				var fechaIni = document.getElementById("fechaIni").value;
				var fechaFin = document.getElementById("fechaFin").value;
				var alumno = document.getElementById("alumno").value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre 
																	+ "&empresa=" + empresa + "&fechaIni=" + fechaIni + "&fechaFin=" + fechaFin + "&alumno=" + alumno;
			}
			</script>
		';
	}
	else {
		echo "nope";
	}*/
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
</script>