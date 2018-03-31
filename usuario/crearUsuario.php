<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/linea_investigacion.php");

	$linea_investigacion = new Linea_Investigacion;
	$lineasInv = $_POST['linInves'];
	$jsonLineas = json_encode(explode("-", $lineasInv));
	$jsonLineas = json_decode($jsonLineas);
	for($i = 0; $i < count($jsonLineas) - 1; $i++){
		if($jsonLineas[$i] == ""){
		}
		else{
			$auxLin = $jsonLineas[$i];
			$linea_investigacion->crear($auxLin);
		}
	}

	include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$centroUniversitario = $_POST['centroUniv'];
	$grado_estudios = $_POST['gradoEstudios'];
	$clave = $_POST['clave'];
	
	$usuario = new Usuario;
	$usuario->crear($username, $email, $password, $nombre, $apellidos, $centroUniversitario, $grado_estudios, $clave);
	$tipo_usuario = new Tipo_Usuario;
	$tipo_usuario->admin->crearUsuario($usuario);


	for($i = 0; $i < count($jsonLineas) - 1; $i++){
		if($jsonLineas[$i] == ""){
		}
		else{
			$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');
			$lin = $jsonLineas[$i];
			$insert = "INSERT INTO USR_LIN_INVES(lin_inves, usrname) VALUES ('$lin', '$username')";
			if(mysqli_query($conn, $insert)){
				mysqli_close($conn);
			}
			else{
				echo "Error: ". mysqli_error($conn);
				mysqli_close($conn);
			}
		}
	}

	echo '<script type="text/javascript">
    	window.location.href="/index.html";
    </script>';
?>