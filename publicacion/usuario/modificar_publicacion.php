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
							<tr><input id="nombre" name="nombre" type="text" placeholder="Linea de investigacion" value="'.$row["nomInvestigacion"].'"required></input></tr>
							<tr><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></tr>
						</table>
						<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
					</div>
			</section>
			<script>
				function modificarDatos(){
					alert("Modificando publicación...");
					var nombre = document.getElementById("nombre").value;
					window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre;
				}
			</script>
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
		echo'
			<section id="banner">
				<h1>Artículo</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" value="'.$row["nomArticulo"].'" required></input></th>
						<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista"  value="'.$row["nombreRevista"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" value="'.$row["noPaginas"].'" required></input></th>
						<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" value="'.$row["isbn"].'" required></input></th>
					</tr>
					<tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
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
						<th><input id="colaborador" name="colaborador" type="text" placeholder="Colaborador(es)"></input></th>
					</tr>
				</table>
				<button id="mod" type="button" name="mod" onclick="modificarDatos()">Actualizar</button>
			</section>
			<script>
				function modificarDatos(){
					alert("Modificando publicación...");
					var nombre = document.getElementById("nombre").value;
					var nomRev = document.getElementById("nomRev").value;
					var noPag = document.getElementById("noPag").value;
					var isbn = document.getElementById("isbn").value;
					var fecha = document.getElementById("fecha").value;
					var selector = document.getElementById("tipo");
					var valor = selector[selector.selectedIndex].value;
					window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre 
																+ "&nomRev=" + nomRev +  "&noPag=" + noPag + "&isbn=" + isbn
																+ "&fecha=" + fecha + "&tipoArt=" + valor;

				}
			</script>
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
		echo'
			<section id="banner">
				<h1>Bibliografico</h1>
			</section>
			<section>
				<table>
					<tr>
						<th><input id="nombre" name="nombre" type="text" placeholder="Artículo" value="'.$row["nomArticulo"].'" required></input></th>
						<th><input id="nomRev" name="nomRev" type="text" placeholder="Revista"  value="'.$row["nombreRevista"].'" required></input></th>
					</tr>
					<tr>
						<th><input id="noPag" name="noPag"type="text" placeholder="No.Páginas" value="'.$row["noPaginas"].'" required></input></th>
						<th><input id="isbn" name="isbn"type="text" placeholder="ISBN" value="'.$row["isbn"].'" required></input></th>
					</tr>
						<th>Fecha de registro</th>
						<th><input id="fecha" name="fecha" type="date" placeholder="Fecha" value="'.$row["fechaPublicacion"].'" required></input></th>
					</tr>
					<tr>
					<tr>
						<th><input id="editorial" name="editorial" type="text" placeholder="Editorial"  value="'.$row["editorial"].'" required></input></th>
						<th><select id="tipo" name="tipo" required>
								<option value="1">Libro</option>
								<option value="2">Memorias</option>
							</select>
						</th>
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
				var nomRev = document.getElementById("nomRev").value;
				var noPag = document.getElementById("noPag").value;
				var isbn = document.getElementById("isbn").value;
				var fecha = document.getElementById("fecha").value;
				var editorial = document.getElementById("editorial").value;
				var selector = document.getElementById("tipo");
				var valor = selector[selector.selectedIndex].value;
				window.location.href="/publicacion/usuario/mod.php/?info="+ '.$info.' + "&tipo=" + '.$tipo.' + "&nombre=" + nombre 
																+ "&nomRev=" + nomRev +  "&noPag=" + noPag + "&isbn=" + isbn
																+ "&fecha=" + fecha + "&editorial=" + editorial +"&tipoArt=" + valor;
				
			}
			</script>
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
	}
?>
