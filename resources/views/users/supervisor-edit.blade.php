@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-6 text-center">
			<img src="/img/supervisor.svg" class="img-fluid" />
		</div>
		<div class="col-6">
			<form method="POST" id="data_form"
				action="{{ route('users.supervisor.update', $user) }}"
				class="rounded border px-4 py-3 shadow"
			>
				@method('PATCH')
				@include('users._form', [
					'main_title' => 'Datos del Supervisor',
					'route' => 'users.supervisor.index',
					'button' => 'Editar',
				])
			</form>
		</div>
	</div>
@endsection