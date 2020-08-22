<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Factura</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="p-3">
		<div style="font-size: 26px; margin-bottom: 3%; text-align: center;">
			<img src="{{ asset('img/farmacia.svg') }}" style="height: 70px;" />
		</div>
		<table class="table table-bordered" style="margin-bottom: 3%;">
			<tbody>
				<tr>
					<td width="45%" class="table-info text-center font-weight-bold" style="vertical-align: middle;">FACTURA N° {{ $invoice->invoice_code }}</td>
					<td rowspan="2">
						<div class="text-center font-weight-bold border-bottom" style="margin-bottom: 2%;">
							Datos del Cliente
						</div>
						<div>
							<table class="table-borderless table-sm" style="margin: 0;">
								<tr>
									<td>C.I.:</td>
									<td>{{ $invoice->customer->identification }}</td>
								</tr>
								<tr>
									<td>Nombres:</td>
									<td>{{ $invoice->customer->presenter()->completeName() }}</td>
								</tr>
								<tr>
									<td>Email:</td>
									<td>{{ $invoice->customer->email }}</td>
								</tr>
								<tr>
									<td>Dirección:</td>
									<td>{{ $invoice->customer->address }}</td>
								</tr>
								<tr>
									<td>Celular:</td>
									<td>{{ $invoice->customer->cellphone }}</td>
								</tr>
								<tr>
									<td>Tipo de Pago:</td>
									<td>{{ $invoice->paymentType->name }}</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: middle;">
						<table class="table-sm table-borderless">
							<tr>
								<td width="30%" class="text-right" style="padding-left: 20px;">Fecha:</td>
								<td style="padding-left: 20px;">{{ date('Y-m-d', strtotime($invoice->created_at)) }}</td>
							</tr>
							<tr>
								<td width="30%" class="text-right" style="padding-left: 20px;">Dirección:</td>
								<td style="padding-left: 20px;">{{ $invoice->pharmacy_address }}</td>
							</tr>
							<tr>
								<td width="30%" class="text-right" style="padding-left: 20px;">Cajero:</td>
								<td style="padding-left: 20px;">{{ $invoice->user->presenter()->completeName() }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered" style="margin-bottom: 3%;">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
					<th>IVA</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach($invoice->invoiceDetails as $detail)
					<tr>
						<td>{{ $detail->name }}</td>
						<td class="text-center">{{ $detail->quantity }}</td>
						<td class="text-right">{{ $detail->price }}</td>
						<td class="text-right">{{ $detail->subtotal }}</td>
						<td class="text-right">{{ $detail->iva_value }}</td>
						<td class="text-right">{{ $detail->total }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="d-inline-block" style="margin-left: 70%; width: 30%;">
			<table class="table table-bordered table-sm">
				<tbody>
					<tr>
						<th class="text-right">Sutotal</th>
						<td class="text-right">{{ $invoice->subtotal }}</td>
					</tr>
					<tr>
						<th class="text-right">IVA</th>
						<td class="text-right">{{ $invoice->iva_value }}</td>
					</tr>
					<tr>
						<th class="text-right">Total</th>
						<td class="text-right">{{ $invoice->total }}</td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</body>
</html>