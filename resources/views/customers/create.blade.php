@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-6 text-center">
			<img src="/img/customer.svg" class="img-fluid" />
		</div>
		<div class="col-6">
			<form method="POST" id="data_form"
				action="{{ route('customers.store') }}"
				class="rounded border px-4 py-3 shadow"
			>
				@include('customers._form', [
					'main_title' => 'Datos del Cliente',
					'route' => 'customers.index',
					'button' => 'Guardar',
				])
			</form>
		</div>
	</div>
@endsection