$.get( "/js/session.php", function( isLogged ) {

	if(isLogged == "true"){

		$.get( "/js/sidebar.php", function( type_user ) {
			if(type_user == 1){
				$("#menu").load("/js/sidebar/sidebar_adm.html");
			}
			else{
				$("#menu").load("/js/sidebar/sidebar_user.html");
			}

			$.get( "/js/user.php", function( username ) {
				$("#usuario").html("<a id='profile'><h4><strong>" + username + "</strong></h4></a>");
			});
		});
		
	}

	else{
		$("#menu").load("/js/sidebar/sidebar_default.html");
	}

	$("#contInfo").load("/mini_info.html");
});