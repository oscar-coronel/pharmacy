@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-4 text-center">
			<img src="/img/shopping-cart.svg" class="img-fluid" />
		</div>
		<div class="col-8">
			<form method="POST" id="purchases_form"
				class="rounded border px-4 py-3 shadow"
			>

				@include('purchases._form', [
					'main_title' => 'Datos de la Compra',
					'button' => 'Guardar',
				])

			</form>
		</div>
	</div>

	<script src="{{ mix('js/purchase.js') }}" defer></script>

@endsection