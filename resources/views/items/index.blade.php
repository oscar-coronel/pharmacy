@extends('layouts.app')

@section('content')
	<div class="row mb-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12 d-flex justify-content-between align-items-center">
					<h1 class="mb-0 text-primary">Listado de Artículos</h1>
					<a href="{{ route('items.create') }}" class="btn btn-primary">
						<span>Crear</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div>
				<table class="table table-striped table-bordered w-100">
					<thead class="table-success">
						<tr>
							<th>Nombre</th>
							<th>Marca</th>
							<th>Precio</th>
							<th>Proveedor</th>
							<th>Categoría</th>
							<th class="text-center">Editar</th>
							<th class="text-center">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
							<tr>
								<td>{{ $item->name }}</td>
								<td>{{ $item->brand }}</td>
								<td>{{ $item->price }}</td>
								<td>{{ $item->provider->name }}</td>
								<td>{{ $item->category->name }}</td>
								<td class="text-center">
									<a href="{{ route('items.edit', $item) }}" title="Editar">
										<img src="/img/edit.svg" style="height: 30px;" />
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="event.preventDefault(); deleteInfo(this);" title="Eliminar">
										<img src="/img/delete.svg" style="height: 30px;" />
									</a>
									<form method="POST" action="{{ route('items.destroy', $item) }}" class="d-none">
										@csrf @method('DELETE')
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection