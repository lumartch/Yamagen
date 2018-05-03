$("#principal").on('click', function() {
    $("#contInfo").load("/mini_info.html");
});

$("#equipo").on('click', function() {
    $("#contInfo").load("/equipo/equipo.html");
});

$("#pub_nuevas").on('click', function() {
    $("#contInfo").load("/publicacion/nuevas/publicaciones_nuevas.html");
});

$("#galeria").on('click', function() {
    $("#contInfo").load("/galeria/galeria.html");
});

$("#pub_buscar").on('click', function() {
    $("#contInfo").load("/buscar/buscar.html");
});

$("#contacto").on('click', function() {
    $("#contInfo").load("/contacto.html");
});
