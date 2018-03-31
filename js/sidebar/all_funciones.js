$("#principal").on('click', function() {
    $("#contInfo").load("/mini_info.html");
});

$("#equipo").on('click', function() {
    $("#contInfo").load("/equipo/equipo.html");
});

$("#pub_nuevas").on('click', function() {
    $("#contInfo").load("/publicaciones_nuevas.html");
});

$("#galeria").on('click', function() {
    $("#contInfo").load("/galeria.html");
});
