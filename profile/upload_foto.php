<?php
    //Toma el nombre del directorio destino
    $target_dir = "imagenes/";
    $id_academico = $_POST["id_academico"];

    //Crea el directorio si no existe
    if(!is_dir($target_dir.$id_academico)){
        mkdir($target_dir.$id_academico);
    }

    //Crea el directorio destino
    $target_file = $target_dir.$id_academico."/". basename($_FILES["archivo"]["name"]);

    // Verifica el formato
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Solo se permiten formatos: JPG, JPEG, PNG y GIF.";
        return;
    }

    // Verifica el tamaño del archivo
    if ($_FILES["archivo"]["size"] > 500000) {
        echo "ERROR. El archivo es muy grande.";
        return;
    }

    // Si existe un archivo con el mismo nombre lo elimina
    if (file_exists($target_file)) {
        unlink($target_file);
    }

    //Mueve el archivo nuevo dentro del directorio
    move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file);

    //Renombra el archivo
    $newNombre = $target_dir.$id_academico."/".$id_academico.".".$imageFileType;
    rename($target_file, $newNombre);
    
    //Crea el objeto y guarda la ruta de la imagen
    include ($_SERVER['DOCUMENT_ROOT']."/class/tipo_usuario.php");
    $usr = new Usr;
    $usr->cambiarFoto($id_academico, "/profile/".$newNombre);
    echo "¡Foto de perfil actualizada!";
?>