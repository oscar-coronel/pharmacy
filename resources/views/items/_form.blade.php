@csrf
<h4 class="text-center text-primary">{{ $main_title }}</h4>
<hr />
<div class="form-row">
	<div class="form-group col-5">
		<label for="item_name">Nombre</label>
		@include('items._input',[
			'type' => 'text',
			'name' => 'item_name',
			'placeholder' => 'Nombre',
			'old_value' => $item->name,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="brand">Marca</label>
		@include('items._input',[
			'type' => 'text',
			'name' => 'brand',
			'placeholder' => 'Marca',
			'old_value' => $item->brand,
		])
	</div>
</div>
<div class="form-row">
	<div class="form-group col-5">
		<label for="price">Precio</label>
		@include('items._input',[
			'type' => 'text',
			'name' => 'price',
			'placeholder' => 'Precio',
			'old_value' => $item->price,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label>¿Tiene IVA?</label>
		<div class="col-12 pl-0">
			<div class="form-check form-check-inline">
				<input type="radio" name="is_iva" id="si_iva" value="1"
					{{ old('is_iva', strval($item->is_iva)) === '1' ? 'checked' : null }}
					class="form-check-input"
				/>
				<label for="si_iva" class="form-check-label">Sí</label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" name="is_iva" id="no_iva" value="0"
					{{ old('is_iva', strval($item->is_iva)) === '0' ? 'checked' : null }}
					class="form-check-input"
				/>
				<label for="no_iva" class="form-check-label">No</label>
			</div>
		</div>
		@error('is_iva')
			<div class="invalid-feedback d-block" role="alert">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
	</div>
</div>
<div class="form-row">
	<div class="form-group col-5">
		<label for="item_category_id">Categorías</label>
		<select name="item_category_id" id="item_category_id"
			class="selectpicker form-control
				@error('item_category_id')
					is-invalid
				@enderror
			"
			data-live-search="true"
		>
			@foreach($categories as $category)
				<option value="{{ $category->id }}"
					{{ $item->item_category_id == $category->id ? 'selected' : null}}
				>{{ $category->name }}</option>
			@endforeach
		</select>
		@error('item_category_id')
			<div class="invalid-feedback d-block" role="alert">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
	</div>
	<div class="form-group col-5 offset-2">
		<label for="provider_id">Proveedor</label>
		<select name="provider_id" id="provider_id"
			class="selectpicker form-control
				@error('provider_id')
					is-invalid
				@enderror
			"
			data-live-search="true"
		>
			@foreach($providers as $provider)
				<option value="{{ $provider->id }}"
					{{ $item->provider_id == $provider->id ? 'selected' : null}}
				>{{ $provider->name }}</option>
			@endforeach
		</select>
		@error('provider_id')
			<div class="invalid-feedback d-block" role="alert">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
	</div>
</div>
<hr />
<div class="form-row d-flex justify-content-between align-items-center">
	<a href="{{ route($route) }}" class="btn btn-link">Cancelar</a>
	<button type="submit" class="btn btn-primary">{{ $button }}</a>
</div>