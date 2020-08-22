'use strict';

var loading_modal_btn = $('#loading_modal_btn');
var loading_modal = $('#loading_modal');

var table_content = $('#table_content');
var purchases_form = $('#purchases_form');

var send_data_to_server = {
	headboard: {},
	value: false,
	detail: []
};
var detail_to_server = [];

window.current_provider_id = Number($('#provider_id').val());

purchases_form.submit((event) => {
	event.preventDefault();

	if (send_data_to_server.value) {
		$.ajax({
			url: Laravel.purchases_store,
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': Laravel.csrfToken
			},
			dataType: 'JSON',
			data: send_data_to_server,
			beforeSend: () => {
				loading_modal_btn.click();
			}
		})
		.done(function(data) {
			setTimeout(() => {
				if (data.value) {
					loading_modal.find('h1').hide();
					let message = '¡Transacción exitosa!';
					showAlert('success', message, () => {
						window.location.href = Laravel.purchases_index;
					});
				} else {
					loading_modal_btn.click();
					let message = '¡El código ingresado ya existe!';
					showAlert('warning', message);
				}
			}, 1500);
		})
		.fail(function(data) {
			console.log(data.responseText);
		})
		.always(function(data) {
		});
	} else {
		let message = '¡Falta llenar información!';
		showAlert('warning', message);
	}
});

window.seeDetail = function(itemPurchaseDetails){
	$('#detail_content table').DataTable().destroy();
	let tbody = $('#detail_content table tbody');
	let html = '';

	let subtotal_final = 0;
	let iva_final = 0;
	let total_final = 0;
	itemPurchaseDetails.forEach((element, index) => {
		html += `
			<tr>
				<td>${ element.name }</td>
				<td class="text-center">${ element.quantity }</td>
				<td class="text-right">${ element.price }</td>
				<td class="text-right">${ element.subtotal }</td>
				<td class="text-right">${ element.iva_value }</td>
				<td class="text-right">${ element.total }</td>
			</tr>
		`;
		subtotal_final += Number(element.subtotal);
		iva_final += Number(element.iva_value);
		total_final += Number(element.total);
	});
	tbody.html(html);
	$('#subtotal_final').text(subtotal_final.toFixed(2));
	$('#iva_final').text(iva_final.toFixed(2));
	$('#total_final').text(total_final.toFixed(2));
	redrawDataTable('#detail_content table');
}

window.addTable = function(element){
	table_content.html(`
		<table id="purchases_table" class="table table-hover table-bordered w-100">
		    <thead>
		        <tr>
		        	<th></th>
		            <th>Producto</th>
		            <th>Cantidad</th>
		            <th>Precio</th>
		            <th>Subtotal</th>
		            <th>IVA</th>
		            <th>Total</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		            <th colspan="4" class="text-center">
		            	Total
		            </th>
		            <th id="final_subtotal" style="vertical-align: middle; text-align: center;"></th>
		            <th id="final_iva" style="vertical-align: middle; text-align: center;"></th>
		            <th id="final_total" style="vertical-align: middle; text-align: center;"></th>
		        </tr>
		    </tfoot>
		</table>
	`);

	$('#purchases_table').DataTable().destroy();
    var t = $('#purchases_table').DataTable({
    	lengthChange: false,
		ordering: false,
		paging: false,
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
    var counter = 1;

    $('#addRow').on( 'click', function () {
    	let options = getOptionsForSelect();
        t.row.add( [
            `<img src="/img/delete_row.svg" style="max-height: 20px; cursor: pointer;"
            		id="delete_btn_${ counter }" />`,
            `<select class="selectpicker form-control"
            		data-live-search="true"
            		onchange="putDataOfItem(this); calculateOfItem(this); verifySameItem(this, 'purchases_table');"
            >
            	${ options }
            </select>`,
            `<input type="text"
            		class="form-control"
            		onkeypress="return validateNumber(event);"
            		oninput="calculateOfItem(this);"
            />`,
            '',
            '',
            '',
            ''
        ] ).draw( false );

        $(`#delete_btn_${ counter }`).on('click', function() {
        	t.row( $(this).parents('tr') ).remove().draw( false );
        	calculateAllItems();
        });
        counter++;
        table_content.find('select').selectpicker();
        calculateAllItems();
    } );
    // Automatically add a first row of data
    $('#addRow').removeClass('d-none');
    element.remove();
};

window.setProvider = function (provider_id){
	current_provider_id = Number(provider_id);
	let options_html = getOptionsForSelect();
	table_content.find('select').html(options_html);
	table_content.find('select').selectpicker('refresh');
	table_content.find('tr').each((index, element) => {
		let td_list = $().add(element).find('td');
		td_list.eq(3).text('');
		td_list.eq(4).text('');
		td_list.eq(5).text('');
		td_list.eq(6).text('');
	});
	calculateAllItems();
};

window.calculateOfItem = function(html_element){
	let td_list = $().add(html_element).parents('tr').find('td');

	let item_id = Number(td_list.eq(1).find('select').val());

	let data_of_item = getItem(current_provider_id, item_id);

	if (data_of_item.value) {
		let price = Number(data_of_item.data.price);
		let quantity = Number(td_list.eq(2).find('input').val());

		let subtotal = quantity * price;
		let iva = !!data_of_item.data.is_iva ? subtotal * 0.12 : 0;
		let total = subtotal + iva;

		td_list.eq(4).css({
			'text-align': 'right',
			'vertical-align': 'middle'
		}).text( subtotal.toFixed(2) );

		td_list.eq(5).css({
			'text-align': 'right',
			'vertical-align': 'middle'
		}).text( iva.toFixed(2) );

		td_list.eq(6).css({
			'text-align': 'right',
			'vertical-align': 'middle'
		}).text( total.toFixed(2) );

	} else {
		td_list.eq(4).text('');
		td_list.eq(5).text('');
		td_list.eq(6).text('');
	}

	calculateAllItems();
};

window.calculateAllItems = function(){
	let tr_list = table_content.find('table tbody tr');

	let final_subtotal = 0;
	let final_iva = 0;
	let final_total = 0;

	detail_to_server = [];
	let detail_centinela = true;

	tr_list.each((tr_index, tr_element) => {
		let td_list = $().add(tr_element).find('td');
		let item_id = Number(td_list.eq(1).find('select').val());
		let data_of_item = getItem(current_provider_id, item_id);
		if (data_of_item.value) {
			let price = Number(data_of_item.data.price);
			let quantity = Number(td_list.eq(2).find('input').val());

			let subtotal = quantity * price;
			let iva = !!data_of_item.data.is_iva ? subtotal * 0.12 : 0;
			let total = subtotal + iva;

			final_subtotal += subtotal;
			final_iva += iva;
			final_total += total;

			// Recolección de información para el servidor
			let detail_subdata = {
				name: data_of_item.data.name,
				quantity: quantity,
				price: price,
				subtotal: subtotal,
				iva_value: iva,
				total: total,
				item_id: data_of_item.data.id
			};

			detail_to_server.push(detail_subdata);

			if (!(!!quantity)) {
				detail_centinela = false;
			}

		} else {
			final_subtotal += 0;
			final_iva += 0;
			final_total += 0;

			detail_centinela = false;
		}
	});

	$('#final_subtotal').css({
		'text-align': 'right',
		'vertical-align': 'middle'
	}).text( final_subtotal.toFixed(2) );

	$('#final_iva').css({
		'text-align': 'right',
		'vertical-align': 'middle'
	}).text( final_iva.toFixed(2) );

	$('#final_total').css({
		'text-align': 'right',
		'vertical-align': 'middle'
	}).text( final_total.toFixed(2) );

	let purchase_code = $('#purchase_code').val().toString().trim();
	let provider_id = Number($('#provider_id').val());

	send_data_to_server['value'] = detail_centinela && !!purchase_code.length && !!detail_to_server.length;
	send_data_to_server['detail'] = detail_to_server;

	send_data_to_server['headboard'] = {
		purchase_code: purchase_code,
		subtotal: final_subtotal,
		iva_value: final_iva,
		total: final_total,
		provider_id: provider_id
	};
};

window.putDataOfItem = function(html_element){
	let item_id = Number(html_element.value);

	let td_list = $().add(html_element).parents('tr').find('td');

	let data_of_item = getItem(current_provider_id, item_id);

	if (data_of_item.value) {
		td_list.eq(3).css({
			'text-align': 'right',
			'vertical-align': 'middle'
		}).text( data_of_item.data.price );
	} else {
		td_list.eq(3).text('');
	}
};

window.getItem = function(provider_id, item_id){
	if (!!item_id) {
		let data = [];
		providers.forEach((element, index) => {
			if (element.id == provider_id) {
				element.items.forEach((item_element, item_index) => {
					if (item_id == item_element.id) {
						data = item_element;
					}
				});
			}
		});
		return {
			value: true,
			data: data
		};
	} else {
		return {
			value: false,
			data: ''
		};
	}
}

window.getOptionsForSelect = function (){
	let html = '<option value="0">--Seleccionar--</option>';
	providers.forEach((element, index) => {
		if (current_provider_id == element.id) {
			element.items.forEach((item_element, item_index) => {
				html += `
					<option value="${ item_element.id }">${ item_element.name }</option>
				`;
			});
		}
	});
	return html;
};