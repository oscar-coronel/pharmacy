'use strict';
console.log('Hola mundo');

var auth_user_form = $('#auth_user_form');

auth_user_form.submit((event) => {
	if (!isIdCorrect) {
		event.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Error en el campo cédula'
		});
	} else {
		document.getElementById('btn_edit_auth_user').disabled = true;
	}
});