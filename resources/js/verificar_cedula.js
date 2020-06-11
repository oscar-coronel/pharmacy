'use strict';

var id = $('#identification, #user_identification');

window.isIdCorrect = new Array(id.length);

id.keypress(function(event){
	let character = String.fromCharCode(event.keyCode);
	let pattern = /\d/;
	return pattern.test(character);
});

window.verificaCedula = function(){
	id.each(function(index, element){
		let current_index = 0;
		if (element.id == 'user_identification') {
			current_index = 1;
		}

		let content = element.value.toString();
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
				$().add(element).addClass('is-valid').removeClass('is-invalid');
				isIdCorrect[current_index] = true;
			} else {
				$(this).parent().children('.id-message').text('La cédula digitada no es válida.');
				$().add(element).addClass('is-invalid').removeClass('is-valid');
				isIdCorrect[current_index] = false;
			}
		} else {
			$(this).parent().children('.id-message').text('El campo cédula debe de tener 10 dígitos numéricos.');
			$().add(element).addClass('is-invalid').removeClass('is-valid');
			isIdCorrect[current_index] = false;
		}
	});
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
id.keyup(verificaCedula);