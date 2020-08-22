@csrf
<h4 class="text-center text-primary">{{ $main_title }}</h4>
<hr />

<div class="form-row">
	<div class="form-group col-4">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">Código:</span>
			</div>
			<input type="text" name="purchase_code" id="purchase_code" class="form-control" placeholder="Código" value="{{ old('purchase_code', $purchase->purchase_code) }}" onchange="calculateAllItems();" />
		</div>
	</div>
	<div class="form-group col-6 offset-1">
		<div class="input-group">
			<div class="input-group-append">
				<span class="input-group-text">Proveedor:</span>
			</div>
			<select name="provider_id" id="provider_id"
				class="selectpicker form-control border
					@error('provider_id')
						is-invalid
					@enderror
				"
				data-live-search="true"
				onchange="setProvider(this.value);"
			>
				@foreach($providers as $provider)
					<option value="{{ $provider->id }}"
						{{ $purchase->provider_id == $provider->id ? 'selected' : null}}
					>{{ $provider->name }}</option>
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
	<div class="col-12" id="table_content">
	</div>
</div>

<div class="form-row">
	<div class="col-12">
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('purchases.index') }}" class="btn btn-link">Cancelar</a>
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

	var providers = <?php echo $providers; ?>;

</script>