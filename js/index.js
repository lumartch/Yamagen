$.get( "/js/session.php", function( isLogged ) {

	if(isLogged == "true"){

		$.get( "/js/sidebar.php", function( type_user ) {
			if(type_user == 1){
				$("#menu").load("/js/sidebar/sidebar_adm.html");
			}
			else{
				$("#menu").load("/js/sidebar/sidebar_user.html");
			}
		});
		
	}

	else{
		$("#menu").load("/js/sidebar/sidebar_default.html");
	}

	$("#contInfo").load("/mini_info.html");
});