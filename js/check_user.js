$('#username').bind('copy paste', function(e) { e.preventDefault(); });
$('#email').bind('copy paste', function(e) { e.preventDefault(); });
$('#clave').bind('copy paste', function(e) { e.preventDefault(); });

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
				document.getElementById("statusUsername").value = data;
			}
			else{
				document.getElementById("statusUsername").value = data;
			}
			corroborar();
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
				document.getElementById("statusEmail").value = data;
			}
			else{
				document.getElementById("statusEmail").value = data;
			}
			corroborar();
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
				document.getElementById("statusClave").value = data;
			}
			else{
				document.getElementById("statusClave").value = data;
			}
			corroborar();
		});
	}

});

function corroborar(){
	if(document.getElementById("statusUsername").value == "Disponible" &&
		document.getElementById("statusEmail").value == "Disponible" &&
		document.getElementById("statusClave").value == "Disponible"){
		document.getElementById("registrar").disabled = false;
	}
	else{
		document.getElementById("registrar").disabled = true;
	}
}