$("#crearUsuario").on('click', function() {
    $("#contInfo").load("/usuario/crear.html");
});

$("#mostrarUsuarios").on('click', function() {
    $("#contInfo").load("/usuario/mostrar.html");
});