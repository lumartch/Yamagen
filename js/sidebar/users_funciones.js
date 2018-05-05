$.get( "/js/user.php", function( username ) {
	$("#usuario").html("<a id='profile'><h4><strong>" + username + "</strong></h4></a>");
	$("#profile").on('click', function(){
	    $("#contInfo").load("/profile/profile.php");                    
	});
});


$("#pub_user").on('click', function() {
    $("#contInfo").load("/publicacion/usuario/pub_user.html");
});
