require('./bootstrap');
require('bootstrap-select');
require('datatables.net');
require('datatables.net-bs4');

var forms = $('#auth_user_form, #data_form');
var watchBoxClosure = $('#watchBoxClosure');
var watchKardex = $('#watchKardex');

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

window.deleteInfo = (html_element, message = '¿Desea Eliminar el Registro?') => {
	let element = $().add(html_element);
	Swal.fire({
		icon: 'question',
		title: message,
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


let tables = $('table');

if (tables.length > 0) {
	tables.DataTable({
		lengthChange: false,
		ordering: false,
		pageLength: 5,
		language: {
			sProcessing: 'Procesando...',
			sLengthMenu: 'Mostrar _MENU_ registros',
			sZeroRecords: 'No se encontraron datos',
			sEmptyTable: 'No existen registros',
			sInfo: '_MAX_ registros disponibles',
			sInfoEmpty: '0 registros disponibles',
			sInfoFiltered: '(Se filtraron _TOTAL_ registros)',
			sInfoPostFix: '',
			sSearch: 'Buscar:',
			sUrl: '',
			sInfoThousands: ',',
			sLoadingRecords: 'Cargando...',
			oPaginate: {
				sFirst: 'Primero',
				sLast: 'Último',
				sNext: 'Siguiente',
				sPrevious: 'Anterior'
			}
		}
	});
}

window.redrawDataTable = function (table_selector){
	$(table_selector).DataTable({
		lengthChange: false,
		ordering: false,
		pageLength: 5,
		language: {
			sProcessing: 'Procesando...',
			sLengthMenu: 'Mostrar _MENU_ registros',
			sZeroRecords: 'No se encontraron datos',
			sEmptyTable: 'No existen registros',
			sInfo: '_MAX_ registros disponibles',
			sInfoEmpty: '0 registros disponibles',
			sInfoFiltered: '(Se filtraron _TOTAL_ registros)',
			sInfoPostFix: '',
			sSearch: 'Buscar:',
			sUrl: '',
			sInfoThousands: ',',
			sLoadingRecords: 'Cargando...',
			oPaginate: {
				sFirst: 'Primero',
				sLast: 'Último',
				sNext: 'Siguiente',
				sPrevious: 'Anterior'
			}
		}
	});
};

window.validateNumber = function(event){
	let character = String.fromCharCode(event.keyCode);
	let pattern = /[0-9]/;
	return pattern.test(character);
};

window.validateDouble = function(event, element){
	let character = String.fromCharCode(event.keyCode);
	let pattern = /\d/;
	let input_content = (element.value + character).split('.');
	return pattern.test(character) || (input_content.length < 3 && character == '.');
};

window.showAlert = function(icon, title, action = () => ''){
	Swal.fire({
		position: 'center',
		icon: icon,
		title: title,
		showConfirmButton: false,
		timer: 1500
	}).then((value) => {
		action();
	});
};

window.verifySameItem = function(html_element, table_id){
	let tr_list = $(`#${table_id} > tbody > tr`);
	let product_total = 0;

	tr_list.each((index, element) => {
		let tr = $().add(element);
		let select = tr.find('select');
		let select_value = Number(select.val());

		if (select_value == Number(html_element.value)) {
			product_total++;
		}
	});

	if (product_total > 1) {
		let message = 'El producto ya ha sido seleccionado';
		showAlert('warning', message, () => {
			$().add(html_element).selectpicker('val', '0');
		});
	}
};

watchBoxClosure.click(function(){
	let date_of_box = $('#date_of_box').val();
	let url = Laravel.box_closure
	url = url.replace('date', date_of_box)
	window.open(url)
})

watchKardex.click(function(){
	let product = $('#product').val();
	let url = Laravel.kardex
	url = url.replace('product', product)
	window.open(url)
})