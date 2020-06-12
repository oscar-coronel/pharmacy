@include('users._index',[
	'title' => 'Listado de Vendedores',
	'thead_bg' => 'table-success',
	'crear_href' => 'users.seller.create',
	'edit_href' => 'users.seller.edit',
	'destroy_href' => 'users.seller.destroy',
])