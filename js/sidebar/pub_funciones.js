$("#profile").on('click', function(){
    $("#contInfo").load("/js/sidebar/profile.html");                    
});
$("#linInnov").on('click', function() {
    $("#contInfo").load("/publicacion/linInnov.html");
});

$("#articulos").on('click', function() {
    $("#contInfo").load("/publicacion/articulo.html");
});

$("#bibliografico").on('click', function() {
    $("#contInfo").load("/publicacion/bibliografico.html");
});

$("#informe").on('click', function() {
    $("#contInfo").load("/publicacion/informe.html");
});

$("#manual").on('click', function() {
    $("#contInfo").load("/publicacion/manual.html");
});

$("#prod_Innovadora").on('click', function() {
    $("#contInfo").load("/publicacion/prod_Innovadora.html");
});

$("#prototipo").on('click', function() {
    $("#contInfo").load("/publicacion/prototipo.html");
});

$("#direccion").on('click', function() {
    $("#contInfo").load("/publicacion/direccion.html");
});

$("#estadia").on('click', function() {
    $("#contInfo").load("/publicacion/estadia.html");
});

$("#proy_inv").on('click', function() {
    $("#contInfo").load("/publicacion/proy_inv.html");
});

$("#pub_pendientes").on('click', function() {
    $("#contInfo").load("/publicacion/pendiente/pub_pendientes.html");
});