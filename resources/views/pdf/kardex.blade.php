<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kardex - {{ $product->item->name }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="p-3">
		<div style="font-size: 26px; margin-bottom: 1%; text-align: center;">
			<img src="{{ asset('img/farmacia.svg') }}" style="height: 70px;" />
		</div>

		<div style="margin-bottom: 1%; text-align: center; font-size: 20px;">
			<span>Kardex</span>
		</div>

		<div style="font-size: 14px; margin-bottom: 3%;">
			<table style="border-collapse: collapse; width: 100%;" border="1">
				<tbody>
					<tr>
						<td class="px-2">Proveedor: {{ $product->item->provider->name }}</td>
						<td class="px-2">Producto: {{ $product->item->name }}</td>
					</tr>
					<tr>
						<td class="px-2">Usuario: {{ Auth::user()->presenter()->completeName() }}</td>
						<td class="px-2">Fecha de Kardex: {{ date('Y-m-d') }}</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div>
			<table class="table table-bordered" style="margin-bottom: 3%;">
				<thead>
					<tr>
						<th style="text-align: center; vertical-align:  middle;" rowspan="2">Fecha</th>
						<th style="text-align: center;" colspan="2">Entradas</th>
						<th style="text-align: center;" colspan="2">Salidas</th>
						<th style="text-align: center; vertical-align:  middle;" rowspan="2">Stock</th>
					</tr>
					<tr>
						<th style="text-align: center;">Cantidad</th>
						<th style="text-align: center;">Valor</th>
						<th style="text-align: center;">Cantidad</th>
						<th style="text-align: center;">Valor</th>
					</tr>
				</thead>
				<tbody>
					@php
						$stock = 0;
					@endphp
					@foreach($data as $item)
						<tr>
							<td style="text-align: center; vertical-align:  middle;">{{ date('Y-m-d H:i:s', strtotime($item['created_at'])) }}</td>
							<td style="text-align: center; vertical-align:  middle;">{{ $item['is_purchase'] ? $item['quantity'] : '' }}</td>
							<td style="text-align: right; vertical-align:  middle;">{{ $item['is_purchase'] ? $item['total'] : '' }}</td>
							<td style="text-align: center; vertical-align:  middle;">{{ $item['is_purchase'] ? '' : $item['quantity'] }}</td>
							<td style="text-align: right; vertical-align:  middle;">{{ $item['is_purchase'] ? '' : $item['total'] }}</td>
							<td style="text-align: center; vertical-align:  middle;">{{ $item['is_purchase'] ? $stock += $item['quantity'] : $stock -= $item['quantity'] }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</body>
</html>