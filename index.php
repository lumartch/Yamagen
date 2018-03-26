<?php
	session_start();
?>
<!-- Scripts -->
<script src="session/sidebar.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<html>
	<head>
		<title>Yamagen by Black Mesa</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div id="mainInner" class="inner">
					<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo"><strong>Yamagen</strong> by Black Mesa</a>
					</header>

					<!-- Banner -->
					<section id="banner">
						<div class="content" id="content">
							<header>
								<h1>¡Hola!, Esto es Yamagen<br />
								by Black Mesa</h1>
							</header>
							<p>La Secretaría de Educación Pública ha lanzado un programa de estímulos para profesores de escuelas educativas a nivel superior. El Programa para el Desarrollo Profesional Docente, para el Tipo Superior (PRODEP) organiza a los profesores en equipos llamados cuerpos académicos con el fin de que desarrollen sus capacidades de investigación, docencia, desarrollo tecnológico e innovación.</p>
							<ul class="actions">
								<li><button id="info" class="button big">Seguir leyendo</button></li>
								<!--Script para cargar -->
								<script>
								$("#info").on("click", function(){
									$("#banner").load("info.html");
								});
								</script>
							</ul>
						</div>

						<div class="img-container">
							<img src="imagenes/blackmesalogo.jpg" alt="Logo"></img>
						</div>

					</section>
				</div>
			</div>

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">
					<!-- Buscar -->
						<section id="search" class="alt">
							<form method="post" action="#">
								<input type="text" name="query" id="query" placeholder="Search" />
							</form>
						</section>

					<!-- Menu -->
						<nav id="menu">
							<header class="major">
								<h2>Menú</h2>
							</header>
						<div id="username"><h2>Bienvenido</h2></div>
						<div id="menuSide"/>
						</nav>
				</div>
			</div>
		</div>
	</body>
	<!--Carga Interfaz para cada tipo de usuario-->
	<script language="javascript" type="text/javascript">
		var isLogged = "<?php echo $_SESSION['isLogged'];?>";
		if(isLogged == true){
			var type_user = "<?php echo $_SESSION['type_user'];?>";
			if(type_user == 1){
				$("#menuSide").load("sidebar_admin.html");
			}
			else{
				$("#menuSide").load("sidebar_user.html");
			}
			//$("$username").load("<h2>Bienvenido <?php echo $_SESSION['username']; ?></h2>")
		}
		else{
			$("#menuSide").load("sidebar_default.html");
			//$("$username").load("<h3>Bienvenido</h3>")
		}
	</script>
</html>