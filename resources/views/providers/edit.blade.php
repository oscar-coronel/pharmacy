@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-6 text-center">
			<img src="/img/provider.svg" class="img-fluid" />
		</div>
		<div class="col-6">
			<form method="POST"
				action="{{ route('providers.update', $user) }}"
				class="rounded border px-4 py-3 shadow"
			>
				@method('PATCH')
				@include('providers._form', [
					'main_title' => 'Datos del Proveedor',
					'route' => 'providers.index',
					'button' => 'Editar',
				])
			</form>
		</div>
	</div>
@endsection