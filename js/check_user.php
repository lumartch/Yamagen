<?php
	$conn = mysqli_connect('localhost', 'root', '', 'Yamagen');

	if(isset($_POST['username'])){
		$username = $_POST['username'];
		if(!empty($username)){
			$select = "SELECT username FROM USUARIO WHERE username = '$username'";
			$resultado = mysqli_query($conn, $select);
			if(mysqli_num_rows($resultado) == 0){
				echo "Disponible";
			}
			else if(mysqli_num_rows($resultado) == 1){
				echo "No disponible";
			}
		}
	}
	mysqli_close($conn);
?>