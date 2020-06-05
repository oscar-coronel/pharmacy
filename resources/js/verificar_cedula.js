'use strict';

var id = document.getElementById('identification');
window.isIdCorrect = false;

id.onkeypress = function(event){
	let character = String.fromCharCode(event.keyCode);
	let pattern = /\d/;
	return pattern.test(character);
};

window.verificaCedula = function(){
	let content = id.value.toString();
	let lon = content.length;
	if (lon == 10) {
		let sum = 0;
		for(let i = 0; i < lon - 1; i++) {
			let digit = Number(content.charAt(i));
			sum = i % 2 == 0 ? sum + sumDigits((digit * 2)) : sum + digit;
		}
		let residuo = sum % lon;
		let result = lon - (residuo == 0 ? lon : residuo) == Number(content.charAt(lon - 1));
		if (result) {
			$().add(id).addClass('is-valid').removeClass('is-invalid');
			isIdCorrect = true;
		} else {
			$('#message').text('La cédula digitada no es válida.');
			$().add(id).addClass('is-invalid').removeClass('is-valid');
			isIdCorrect = false;
		}
	} else {
		$('#message').text('El campo cédula debe de tener 10 dígitos numéricos.');
		$().add(id).addClass('is-invalid').removeClass('is-valid');
		isIdCorrect = false;
	}
}

function sumDigits(number){
	let number_str = String(number);
	let final_digit = 0;
	for(let i = 0, lon = number_str.length ; i < lon ; i++){
		final_digit += Number(number_str.charAt(i));
	}
	return final_digit;
}



window.onload = verificaCedula;
id.onkeyup = verificaCedula;