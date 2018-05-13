<?php
    include ($_SERVER['DOCUMENT_ROOT']."/class/conexion.php");
    $aux = new Conexion;
    $conn = $aux->conexion();
    $json = array();
    //Selecciona de la linea innovadora
    $select = "SELECT * FROM LIN_INNOVADORA WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("LIN_INNOVADORA" => count($row));
    //Selecciona de articulos
    $select = "SELECT * FROM ARTICULO WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("ARTICULO" => count($row));
    //Selecciona de bibliografico
    $select = "SELECT * FROM BIBLIOGRAFICO WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("BIBLIOGRAFICO" => count($row));
    //Selecciona de direccion
    $select = "SELECT * FROM DIRECCION WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("DIRECCION" => count($row));
    //Selecciona de estadia
    $select = "SELECT * FROM ESTADIA WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("ESTADIA" => count($row));
    //Selecciona de informe
    $select = "SELECT * FROM INFORME_TECNICO WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("INFORME_TECNICO" => count($row));
    //Selecciona de manual de operacion
    $select = "SELECT * FROM MANUAL_OPERACION WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("MANUAL_OPERACION" => count($row));
    //Selecciona de productividad innovadora
    $select = "SELECT * FROM PROD_INNOVADORA WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("PROD_INNOVADORA" => count($row));
    //Selecciona de prototipo
    $select = "SELECT * FROM PROTOTIPO WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("PROTOTIPO" => count($row));
    //Selecciona de manual de proyecto de investigacion
    $select = "SELECT * FROM PROY_INVESTIGACION WHERE status = false";
    $resultado = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($resultado);
    $json += array("PROY_INVESTIGACION" => count($row));
    echo json_encode($json);
    mysqli_close($conn);
?>