@csrf
<h4 class="text-center text-primary">{{ $main_title }}</h4>
<hr />

<div class="form-row">
	<div class="form-group col-4">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">Código:</span>
			</div>
			<input type="text" name="invoice_code" id="invoice_code" class="form-control" placeholder="Código" value="{{ old('invoice_code', $invoice->invoice_code) }}" onchange="calculateAllItems();" />
		</div>
	</div>
	<div class="form-group col-6 offset-1">
		<div class="input-group">
			<div class="input-group-append">
				<span class="input-group-text">Cliente:</span>
			</div>
			<select name="customer_id" id="customer_id"
				class="selectpicker form-control border
					@error('customer_id')
						is-invalid
					@enderror
				"
				data-live-search="true"
			>
				@foreach($customers as $customer)
					<option value="{{ $customer->id }}"
						{{ $invoice->customer_id == $customer->id ? 'selected' : null}}
					>{{ $customer->presenter()->completeName() }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group col-1 text-right">
		<img src="/img/add_table.svg" class="img-fluid" style="max-height: 40px; cursor: pointer;" title="Añadir tabla" onclick="addTable(this);" />
		<img src="/img/add_row.svg" class="img-fluid d-none" id="addRow" style="max-height: 40px; cursor: pointer;" title="Añadir fila" />
	</div>
</div>

<div class="form-row">
	<div class="form-group col-4">
		<div class="input-group">
			<div class="input-group-append">
				<span class="input-group-text">Tipo de Pago:</span>
			</div>
			<select name="payment_type_id" id="payment_type_id"
				class="selectpicker form-control border
					@error('payment_type_id')
						is-invalid
					@enderror
				"
				data-live-search="true"
			>
				@foreach($paymentTypes as $paymentType)
					<option value="{{ $paymentType->id }}"
						{{ $invoice->payment_type_id == $paymentType->id ? 'selected' : null}}
					>{{ $paymentType->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="form-row">
	<div class="col-12" id="table_content">
	</div>
</div>

<div class="form-row">
	<div class="col-12">
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('invoices.index') }}" class="btn btn-link">Cancelar</a>
			<button type="submit" class="btn btn-primary">{{ $button }}</button>
		</div>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="d-none" id="loading_modal_btn" data-toggle="modal" data-target="#loading_modal">
</button>

<!-- Modal -->
<div class="modal fade bg-white" id="loading_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-primary">
        <h1 class="text-center" id>Transcacción en curso...</h1>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	var products = <?php echo $products; ?>;

</script>