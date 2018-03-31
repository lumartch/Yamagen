$("#crearUsuario").on('click', function() {
    $("#contInfo").load("/usuario/crear.html");
});

$("#mostrarUsuarios").on('click', function() {
    $("#contInfo").load("/usuario/mostrar.html");
});

$("#pub_pendientes").on('click', function() {
    $("#contInfo").load("/publicacion/pendiente/pub_pendientes.html");
});