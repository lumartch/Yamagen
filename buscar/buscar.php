<?php
	include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
	$aux = new Conexion;
	$conn = $aux->conexion();
	
	$nombre = $_POST["nomUsr"];
	$select = "SELECT * FROM ACADEMICO WHERE nombre LIKE '%$nombre%'";
	$resultado = mysqli_query($conn, $select);

	$publicacion = $_POST["nomPub"];

	$fecha = "";
	if($_POST["fechaPub1"] != null && $_POST["fechaPub2"] != null){
		$f1 = $_POST["fechaPub1"];
		$f2 = $_POST["fechaPub2"];
		$fecha = "AND (fechaInsercion BETWEEN '$f1' AND '$f2')";
	}


	$json = array();
	$i = 0;
	
	while($row = mysqli_fetch_assoc($resultado)){
		$json[$i] = $row;
		$id_academico = $row["id"];

		$selectLineasInvestigacion = "SELECT * FROM USR_LIN_INVES WHERE id_academico = '$id_academico'";
		$resultadoLineas =  mysqli_query($conn, $selectLineasInvestigacion);
		$jsonLineas = array();

		$p = 0;
		while($row = mysqli_fetch_assoc($resultadoLineas)){
			$selectLinea = "SELECT * FROM LINEA_INVESTIGACION WHERE id = '".$row["id_lin_inves"]."'";
			$resLinea = mysqli_query($conn, $selectLinea);
			$queryResult = mysqli_fetch_assoc($resLinea);
			
			$jsonLineas[$p] = $queryResult;

			//$jsonLineas[$p] = $row;
			$p++;
		}
		$json[$i] += array( "LINEAS" => $jsonLineas);

		if($_POST["sel1"] != null){
			$jsonLin = array();
			$sel = "SELECT * FROM LIN_INNOVADORA WHERE id_academico = '$id_academico' AND status = true AND nomInvestigacion LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonLin[$j] = $rowLin;

				$id_lin_innov = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_lin_innov = '$id_lin_innov'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonLin[$j] += array("COLABORADOR" => $jsonCol);
				$j++;
			}

			$json[$i] += array("LIN_INNOVADORA" => $jsonLin);
		}


		if($_POST["sel2"] != null){
			$jsonArt = array();
			$sel = "SELECT * FROM ARTICULO WHERE id_academico = '$id_academico' AND status = true AND nomArticulo LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonArt[$j] = $rowLin;

				$id_articulo = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_articulo = '$id_articulo'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}

				$jsonArt[$j] += array("COLABORADOR" => $jsonCol);


				$tipo = $rowLin["id_tipo_articulo"];
				$selTipo = "SELECT tipo FROM TIPO_ARTICULO WHERE id = '$tipo'";
				$resTipo = mysqli_query($conn, $selTipo);
				$rowTipo = mysqli_fetch_assoc($resTipo);
				$jsonArt[$j] += array( "tipo" => $rowTipo["tipo"]);
				$j++;
			}
			$json[$i] += array( "ARTICULO" => $jsonArt);
		}
		if($_POST["sel3"] != null){
			$jsonBiblio = array();
			$sel = "SELECT * FROM BIBLIOGRAFICO WHERE id_academico = '$id_academico' AND status = true AND nomArticulo LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonBiblio[$j] = $rowLin;


				$id_bibliografico = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_bibliografico = '$id_bibliografico'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonBiblio[$j] += array("COLABORADOR" => $jsonCol);

				$tipo = $rowLin["id_tipo_biblio"];
				$selTipo = "SELECT tipo FROM TIPO_BIBLIOGRAFICO WHERE id = '$tipo'";
				$resTipo = mysqli_query($conn, $selTipo);
				$rowTipo = mysqli_fetch_assoc($resTipo);
				$jsonBiblio[$j] += array( "tipo" => $rowTipo["tipo"]);
				$j++;
			}
			$json[$i] += array( "BIBLIOGRAFICO" => $jsonBiblio);
		}
		if($_POST["sel4"] != null){
			$jsonInfo = array();
			$sel = "SELECT * FROM INFORME_TECNICO WHERE id_academico = '$id_academico' AND status = true AND nomPub LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonInfo[$j] = $rowLin;


				$id_informe = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_informe = '$id_informe'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonInfo[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "INFORME_TECNICO" => $jsonInfo);
		}
		if($_POST["sel5"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM MANUAL_OPERACION WHERE id_academico = '$id_academico' AND status = true AND nomPub LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;


				$id_manual = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_manual = '$id_manual'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "MANUAL_OPERACION" => $jsonManual);
		}
		if($_POST["sel6"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM PROD_INNOVADORA WHERE id_academico = '$id_academico' AND status = true AND nomPub LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;


				$id_prod_inn = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_prod_inn = '$id_prod_inn'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "PROD_INNOVADORA" => $jsonManual);
		}
		if($_POST["sel7"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM PROTOTIPO WHERE id_academico = '$id_academico' AND status = true AND nomPub LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;


				$id_prototipo = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_prototipo = '$id_prototipo'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "PROTOTIPO" => $jsonManual);
		}
		if($_POST["sel8"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM PROY_INVESTIGACION WHERE id_academico = '$id_academico' AND status = true AND nomProyecto LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;


				$id_proy_inves = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_proy_inves = '$id_proy_inves'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "PROY_INVESTIGACION" => $jsonManual);
		}
		if($_POST["sel9"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM DIRECCION WHERE id_academico = '$id_academico' AND status = true AND nomDireccion LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;


				$id_direccion = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_direccion = '$id_direccion'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "DIRECCION" => $jsonManual);
		}
		if($_POST["sel10"] != null){
			$jsonManual = array();
			$sel = "SELECT * FROM ESTADIA WHERE id_academico = '$id_academico' AND status = true AND nomEstadia LIKE '%$publicacion%' ".$fecha."";
			$res = mysqli_query($conn, $sel);
			$j = 0;
			while($rowLin = mysqli_fetch_assoc($res)){
				$jsonManual[$j] = $rowLin;

				$id_estadia = $rowLin["id"];

				$selectCol = "SELECT * FROM COLABORADOR WHERE id_estadia = '$id_estadia'";
				$resCol = mysqli_query($conn, $selectCol);
				
				$k = 0;
				$jsonCol = array();
				while($rowCol = mysqli_fetch_assoc($resCol)){
					$jsonCol[$k] = $rowCol;
					$k++;
				}
				$jsonManual[$j] += array("COLABORADOR" => $jsonCol);

				$j++;
			}
			$json[$i] += array( "ESTADIA" => $jsonManual);
		}
		$i++;
	}

	mysqli_close($conn);
	echo json_encode($json);
?>