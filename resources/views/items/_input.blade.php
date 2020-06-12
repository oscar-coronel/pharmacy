<input
	type="{{ $type }}"
	name="{{ $name }}"
	id="{{ $name }}"
	placeholder="{{ $placeholder }}"
	class="form-control
		@error($name)
			is-invalid
		@enderror
	"
	value="{{ old($name, $old_value) }}"
>
@error($name)
	<div class="invalid-feedback" role="alert">
	  <strong>{{ $message }}</strong>
	</div>
@enderror