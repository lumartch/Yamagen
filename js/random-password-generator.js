//generador automatico de contraseñas
var theNumbers = ["2","3","4","5","6","7","8","9"];
var theLetters = ["a","b","c","d","e","f","g","h","j","k","m","n","p","q","r","s","t","u","v","w","x","y","z"];

var a= 1;
var x = 0;

while(x < a){
	var allPwds = "";
	var newPwd = "";
	
	newPwd = theLetters[Math.floor(Math.random()*theLetters.length)];
	allPwds += newPwd;
	newPwd = theLetters[Math.floor(Math.random()*theLetters.length)];
	newPwd = newPwd.toUpperCase(); 
	allPwds += newPwd;
	newPwd = theNumbers[Math.floor(Math.random()*theNumbers.length)];
	allPwds += newPwd;
	var xx = 0;
	while(xx < 4){
		newPwd = theLetters[Math.floor(Math.random()*theLetters.length)];
		allPwds += newPwd;
		xx++;
	}
	
	//scramble the word
	allPwds = allPwds.split('').sort(function(){return 0.5-Math.random()}).join('');
	x++;
	
	//Put new password in place
	document.getElementById("pass").value = allPwds;
}