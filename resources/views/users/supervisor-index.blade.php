@include('users._index',[
	'title' => 'Listado de Supervisores',
	'thead_bg' => 'table-success',
	'crear_href' => 'users.supervisor.create',
	'edit_href' => 'users.supervisor.edit',
	'destroy_href' => 'users.supervisor.destroy',
])