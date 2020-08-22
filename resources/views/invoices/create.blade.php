@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-4 text-center">
			<img src="/img/bill.svg" class="img-fluid" />
		</div>
		<div class="col-8">
			<form method="POST" id="invoices_form"
				class="rounded border px-4 py-3 shadow"
			>

				@include('invoices._form', [
					'main_title' => 'Datos de la Factura',
					'button' => 'Guardar',
				])

			</form>
		</div>
	</div>

	<script src="{{ mix('js/invoice.js') }}" defer></script>

@endsection