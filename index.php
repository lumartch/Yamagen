<?php
	session_start();
?>

<!-- Scripts -->
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
			<!-- Menu -->
			<div id="main">
				<div id="mainInner" class="inner"></div>
			</div>

			<!-- Sidebar -->
			<div id="sidebar"></div>

		</div>
	</body>

	<!--Carga Interfaz para cada tipo de usuario-->
	<script language="javascript" type="text/javascript">
		var isLogged = "<?php echo $_SESSION['isLogged'];?>";
		if(isLogged == true){
			var type_user = "<?php echo $_SESSION['type_user'];?>";
			if(type_user == 1){
				$("#sidebar").load("sidebar/sidebar_admin.html");
			}
			else{
				$("#sidebar").load("sidebar/sidebar_user.html");
			}
		}
		else{
			$("#sidebar").load("sidebar/sidebar_default.html");
		}
		$("#mainInner").load("mini_info.html");
	</script>
	
</html>