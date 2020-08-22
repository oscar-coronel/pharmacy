<div style="margin-bottom: 3%; text-align: center; font-size: 20px;">
	<span>{{ $title }}</span>
</div>
<table class="table table-bordered" style="margin-bottom: 3%;">
	<thead>
		<tr>
			<th>N° Factura</th>
			<th>Productos Vendidos</th>
			<th>Subtotal</th>
			<th>IVA</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $invoice)
			<tr>
				<td>{{ $invoice->invoice_code }}</td>
				<td class="text-center">{{ $invoice->invoiceDetails->count() }}</td>
				<td class="text-right">{{ $invoice->subtotal }}</td>
				<td class="text-right">{{ $invoice->iva_value }}</td>
				<td class="text-right">{{ $invoice->total }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<div class="d-inline-block" style="margin-left: 70%; width: 30%;">
	<table class="table table-bordered table-sm">
		<tbody>
			<tr>
				<th class="text-right">Sutotal</th>
				<td class="text-right">{{ number_format($data->sum('subtotal'), 2, '.', '') }}</td>
			</tr>
			<tr>
				<th class="text-right">IVA</th>
				<td class="text-right">{{ number_format($data->sum('iva_value'), 2, '.', '') }}</td>
			</tr>
			<tr>
				<th class="text-right">Total</th>
				<td class="text-right">{{ number_format($data->sum('total'), 2, '.', '') }}</td>
			</tr>
		</tbody>
	</table>
</div>