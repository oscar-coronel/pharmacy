require('./bootstrap');

var forms = $('#auth_user_form, #data_form');

forms.submit((event) => {
	let form_id = event.currentTarget.id;
	verificaCedula();
	let index = 0;
	if (form_id == 'data_form') {
		index = 1;
	}
	if (!isIdCorrect[index]) {
		event.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Error en el campo cédula'
		});
	} else {
		$('#'+form_id).find('button[type="submit"]').attr('disabled', true);
	}
});

window.deleteInfo = (html_element) => {
	let element = $().add(html_element);
	Swal.fire({
		icon: 'question',
		title: '¿Desea Eliminar el Registro?',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí',
		cancelButtonText: 'No'
	}).then((result) => {
		if (result.value) {
			element.parent().children('form')[0].submit();
		}
	});
}