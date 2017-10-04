function hashPass (){
	var pass = document.getElementById('pass').value;
	var hash = CryptoJS.SHA1(pass);
	document.getElementById('pass').value = hash;
}