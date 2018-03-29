var bandera1 = false;
var bandera2 = false;
var bandera3 = false;

$("#username").keyup(function() {
	var text = $("#username").val();
	if(username == ""){
		$("#statusUsername").html("Vacio");
	}
	else {
		$.post("/js/check_user.php", {username:text},
		function(data){
			$("#statusUsername").html("<br/><ul><li><strong>Username: " + data + "</strong></li></ul>");
			if(data == "Disponible"){
				bandera1 = false;
			}
			else{
				bandera1 = true;
			}
		});
	}
});


$("#email").keyup(function() {
	var text = $("#email").val();
	if(email == ""){
		$("#statusEmail").html("Vacio");
	}
	else {
		$.post("/js/check_email.php", {email:text},
		function(data){
			$("#statusEmail").html("<br/><ul><li><strong>Email: " + data + "</strong></li></ul>");
			if(data == "Disponible"){
				bandera2 = false;
			}
			else{
				bandera2 = true;
			}
		});
	}
});

$("#clave").keyup(function() {
	var text = $("#clave").val();
	if(clave == ""){
		$("#statusClave").html("Vacio");
	}
	else {
		$.post("/js/check_clave.php", {clave:text},
		function(data){
			$("#statusClave").html("<br/><ul><li><strong>Clave: " + data + "</strong></li></ul>");
			if(data == "Disponible"){
				bandera3 = false;
			}
			else{
				bandera3 = true;
			}
		});
	}
});




if(bandera1 == true && bandera2 == true && bandera3 == true){
		document.getElementById("statusUsername").value = "Pos si";
	}
	else{
		document.getElementById("registrar").disabled = false;
	}