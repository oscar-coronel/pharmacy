<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cierre de Caja</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="p-3">
		<div style="font-size: 26px; margin-bottom: 1%; text-align: center;">
			<img src="{{ asset('img/farmacia.svg') }}" style="height: 70px;" />
		</div>

		<div style="margin-bottom: 1%; text-align: center; font-size: 20px;">
			<span>Cierre de Caja</span>
		</div>

		<div style="font-size: 14px; margin-bottom: 3%;">
			<table style="border-collapse: collapse; width: 100%;" border="1">
				<tbody>
					<tr>
						<td width="50%" class="px-2">Usuario: {{ Auth::user()->presenter()->completeName() }}</td>
						<td width="50%" class="px-2">Fecha de Cierre: {{ request('date') }}</td>
					</tr>
					<tr>
						<td class="px-2">Dirección: {{ config('app.address') }}</td>
						<td class="px-2">Fecha de Consulta: {{ date('Y-m-d') }}</td>
					</tr>
				</tbody>
			</table>
		</div>

		@if($invoices->where('payment_type_id', '=', 1)->count() > 0)
			@include('partials._box_closure_table', [
				'title' => 'Pagos con Tarjeta de Crédito',
				'data' => $invoices->where('payment_type_id', '=', 1)
			])
		@endif

		@if($invoices->where('payment_type_id', '=', 2)->count() > 0)
			@include('partials._box_closure_table', [
				'title' => 'Pagos con Cheque',
				'data' => $invoices->where('payment_type_id', '=', 2)
			])
		@endif

		@if($invoices->where('payment_type_id', '=', 3)->count() > 0)
			@include('partials._box_closure_table', [
				'title' => 'Pagos con Efectivo',
				'data' => $invoices->where('payment_type_id', '=', 3)
			])
		@endif



	</div>
</body>
</html>