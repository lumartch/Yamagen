<section id="banner">
	<h1>Perfil de usuario</h1>
</section>

<section id="mostrar_usuarios">
    <form id="formulario" name="formulario" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Foto</th>
                <th>Username</th>
                <th>Contraseña</th>
            </tr>
            <tr>
                <td>
                    <img id="fotografia" height="200" width="200" class="img-rounded"></img></br>
                    <input type="file" name="archivo" id="archivo"></input>
                    <button id="fotoSubmit" name="fotoSubmit" type="button" >Actualizar foto</button>
                </td>
                <td><input id='username' name='username' type='text' disabled></input></td>
                <td><input id='password' name='password' type='text' ></input></td>
                <input type="hidden" id="id_academico" name="id_academico"></input>
                <input type="hidden" id="id_usuario" name="id_usuario"></input>

            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
            </tr>
            <tr>
                <th><input id='nombre' name='nombre' type='text' ></input></th>
                <th><input id='apellidos' name='apellidos' type='text' ></input></th>
                <th><input id='email' name='email' type='text' ></input></th>
            </tr>
            <tr>
                <th>Grado de estudios</th>
                <th>Centro universitario</th>
                <th>Clave única de maestro</th>
            </tr>
            <tr>
                <th><input id='gradoEstudios' name='gradoEstudios' type='text' ></input></th>
                <th><input id='centroUniAct' name='centroUniAct' type='text' ></input></th>
                <th><input id='clave' name='clave' type='text' ></input></th>
            </tr>
        </table>
        <input id="lineas" name="lineas[]" type="text" placeholder="Línea de investigación...." class="form-control name_list"></input>
        <input type="button" name="agregar" id="agregar" value="Agregar"></input>                   
        <table id="lineasTable" class="d">
        </table>
    </form>
</section>
<input id="submit" type="submit" value="Actualizar"></input>


<?php
    session_start();
    $id_academico = $_SESSION['id_academico'];
    $id_usuario = $_SESSION['id_usuario'];
?>

<script>
    var i = 1;
    var id_academico = "<?php echo $id_academico;?>";
    var id_usuario = "<?php echo $id_usuario;?>";
    $( document ).ready(function() {
        $.ajax({
            url:"/profile/mostrar.php",
            method:"POST",
            data: {id_usuario : id_usuario, id_academico : id_academico},
            success:function(data) {
                var datos = JSON.parse(data);
                $("#fotografia").attr("src",datos["fotografia"]);
                $("#username").val(datos["username"]);
                $("#password").val(datos["password"]);
                $("#email").val(datos["email"]);
                $("#nombre").val(datos["nombre"]);
                $("#apellidos").val(datos["apellidos"]);
                $("#centroUniAct").val(datos["centroUniAct"]);
                $("#gradoEstudios").val(datos["gradoEstudios"]);
                $("#clave").val(datos["clave"]);
                $("#id_academico").val(id_academico);
                $("#id_usuario").val(id_usuario);
                var jsonLineas = datos["LINEAS"];
                $.each(jsonLineas, function(ind, val){
                    $('#lineasTable').append('<tr id="row'+ i +'"><td><input id="lineas" name="lineas[]" type="text" placeholder="Línea de investigación...." class="form-control name_list" value= "'+ val['linea'] + '"></input></td><td><input type="button" name="remove" id="' + i + '" class="btn_remove" value="X"></input></td></tr>');
                    i++;
                });
            }
        });
    });

    $('#agregar').click(function(){
        var lineas = $("#lineas").val();
        i++;
        $('#lineasTable').append('<tr id="row' + i + '"><td><input id="lineas" name="lineas[]" type="text" placeholder="Línea de investigación...." class="form-control name_list" value= "'+ lineas +'"></input></td><td><input type="button" name="remove" id="' + i + '" class="btn_remove" value="X"></input></td></tr>');
        $("#lineas").val("");
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row' + button_id + '').remove();
    });


    $('#submit').click(function(){
        if($("#username").val() == ""  || $("#password").val() == ""  || $("#email").val() == "" || $("#nombre").val() == ""
            || $("#apellidos").val() == "" || $("#centroUniAct").val() == "" || $("#gradoEstudios").val() == "" || $("#clave").val() == ""){
            alert("Los campos deben estar llenos.");
            return;
        }       
        $.ajax({
            url:"/profile/modificar.php",
            method:"POST",
            data: $('#formulario').serialize(),
            success:function(data) {
                alert("¡Perfil actualizado!");
                $("#contInfo").load("/profile/profile.php");  
            }
        });
    });

    $('#fotoSubmit').click(function(){
        if($("#archivo").val() == ""){
            alert("No se puede actualizar una foto sin archivo.");
            return;
        } 
        var inputFoto = document.getElementById("archivo");
        var file = inputFoto.files[0];
        var data = new FormData();
        data.append('archivo', file);   
        data.append('id_academico', $("#id_academico").val()); 
        $.ajax({
            url:"/profile/upload_foto.php",
            type:"POST",
            contentType: false,
            data: data,
            processData:false,
            cache:false,
            success:function(data) {
                alert(data);
                $("#contInfo").load("/profile/profile.php");  
            }
        });
    });
</script>