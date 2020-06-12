@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-6 text-center">
			<img src="/img/trolley.svg" class="img-fluid" />
		</div>
		<div class="col-6">
			<form method="POST"
				action="{{ route('items.store') }}"
				class="rounded border px-4 py-3 shadow"
			>
				@include('items._form', [
					'main_title' => 'Datos del Artículo',
					'route' => 'items.index',
					'button' => 'Guardar',
				])
			</form>
		</div>
	</div>
@endsection