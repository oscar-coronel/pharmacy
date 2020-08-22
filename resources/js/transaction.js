'use strict';

var product_title = $('#product_title');
var price = $('#price');
var price_modal_close = $('#price_modal_close');
var stock_table = $('#stock_table');
var current_product = 0;

window.pushProduct = function(product_id){
	price.val('');
	products.forEach((product, product_index) => {
		if (product.id == product_id) {
			current_product = product_id;
			product_title.text(product.item.name);
			price.val(product.price);
		}
	});
};

window.savePrice = function(){
	let price_var = Number(price.val());
	if (!!price_var) {
		let url = Laravel.products_update_price;
		url = url.replace('param', current_product);
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'JSON',
			data: {price: price_var},
			headers: {
				'X-CSRF-TOKEN': Laravel.csrfToken
			}
		})
		.done(function(data) {
			price_modal_close.click();
			let message = '¡Precio actualizado con éxito!';
			showAlert('success', message);
			products = data.products;
			newStockTable(products);
		})
		.fail(function(data) {
			console.log(data.responseText);
		})
		.always(function() {
		});
	} else {
		let message = '¡Digite un precio mayor que 0!';
		showAlert('warning', message);
	}
};

window.newStockTable = function(data){
	$('#stock_table').DataTable().destroy();
	let tr_list = stock_table.find('tbody tr');

	data.forEach((product, index) => {
		tr_list.eq(index).find('td').eq(2).find('a').text(product.price);
	});

	redrawDataTable('#stock_table');
};