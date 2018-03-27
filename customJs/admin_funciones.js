$("#crearUsuario").on('click', function() {
    $("#mainInner").load("usuario/crear.html");
});
$("#modificarUsuario").on('click', function() {
    $("#mainInner").load("/usuario/modificar.html");
});
$("#eliminarUsuario").on('click', function() {
    $("#mainInner").load("/usuario/eliminar.html");
});
$("#mostrarUsuarios").on('click', function() {
    $("#mainInner").load("/usuario/mostrar.html");
});