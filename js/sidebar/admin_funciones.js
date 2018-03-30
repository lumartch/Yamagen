

$("#crearUsuario").on('click', function() {
    $("#contInfo").load("/usuario/crear.html");
});

$("#modificarUsuario").on('click', function() {
    $("#contInfo").load("/usuario/modificar.html");
});

$("#eliminarUsuario").on('click', function() {
    $("#contInfo").load("/usuario/eliminar.html");
});

$("#mostrarUsuarios").on('click', function() {
    $("#contInfo").load("/usuario/mostrar.html");
});