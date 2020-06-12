@extends('layouts.app')

@section('content')
	<div class="row mb-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12 d-flex justify-content-between align-items-center">
					<h1 class="mb-0 text-primary">Listado de Clientes</h1>
					<a href="{{ route('customers.create') }}" class="btn btn-primary">
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
							<th>Cédula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Celular</th>
							<th>Email</th>
							<th>Dirección</th>
							<th>Fecha de Nacimiento</th>
							<th class="text-center">Editar</th>
							<th class="text-center">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->identification }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->cellphone }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->address }}</td>
								<td>{{ $user->presenter()->dateOfBirth()->format('Y-m-d') }}</td>
								<td class="text-center">
									<a href="{{ route('customers.edit', $user) }}" title="Editar">
										<img src="/img/edit.svg" style="height: 30px;" />
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="event.preventDefault(); deleteInfo(this);" title="Eliminar">
										<img src="/img/delete.svg" style="height: 30px;" />
									</a>
									<form method="POST" action="{{ route('customers.destroy', $user) }}" class="d-none">
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