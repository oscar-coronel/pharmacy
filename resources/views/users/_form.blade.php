@csrf
<h4 class="text-center text-primary">{{ $main_title }}</h4>
<hr />
<div class="form-row">
	<div class="form-group col-5">
		<label for="user_identification">Cédula</label>
		<input
			maxlength="10"
			type="text"
			name="user_identification"
			id="user_identification"
			placeholder="Cédula"
			class="form-control"
			value="{{ old('user_identification', $user->identification) }}"
		>
		@error('user_identification')
			<div class="invalid-feedback" role="alert" style="display: block !important;">
				<strong>{{ $message }}</strong>
			</div>
		@enderror
		<div class="invalid-feedback id-message font-weight-bold" role="alert"></div>
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_name">Nombres</label>
		@include('users._input',[
			'type' => 'text',
			'name' => 'user_name',
			'placeholder' => 'Nombres',
			'old_value' => $user->name,
		])
	</div>
</div>
<div class="form-row">
	<div class="form-group col-5">
		<label for="user_cellphone">Celular</label>
		@include('users._input',[
			'type' => 'text',
			'name' => 'user_cellphone',
			'placeholder' => 'Celular',
			'old_value' => $user->cellphone,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_lastname">Apellidos</label>
		@include('users._input',[
			'type' => 'text',
			'name' => 'user_lastname',
			'placeholder' => 'Apellidos',
			'old_value' => $user->lastname,
		])
	</div>
</div>
<div class="form-row">
	<div class="form-group col-5">
		<label for="user_address">Dirección</label>
		@include('users._input',[
			'type' => 'text',
			'name' => 'user_address',
			'placeholder' => 'Dirección de Domicilio',
			'old_value' => $user->address,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_date_of_birth">Fecha de Nacimiento</label>
		@include('users._input',[
			'type' => 'date',
			'name' => 'user_date_of_birth',
			'placeholder' => 'Fecha de Nacimiento',
			'old_value' => $user->presenter()->oldValueForForm(),
		])
	</div>
</div>
<div class="form-row">
	<div class="form-group col-5">
		<label for="user_email">Email</label>
		@include('users._input',[
			'type' => 'text',
			'name' => 'user_email',
			'placeholder' => 'Correo Electrónico',
			'old_value' => $user->email,
		])
	</div>
	@unless($user->id)
		<div class="form-group col-5 offset-2">
			<label for="user_password">Contraseña</label>
			@include('users._input',[
				'type' => 'password',
				'name' => 'user_password',
				'placeholder' => 'Contraseña',
				'old_value' => '',
			])
		</div>
	@endunless
</div>
@unless($user->id)
	<div class="form-row">
		<div class="form-group col-5">
			<label for="user_password_confirmation">Confirmar Contraseña</label>
			@include('users._input',[
				'type' => 'password',
				'name' => 'user_password_confirmation',
				'placeholder' => 'Confirmar Contraseña',
				'old_value' => '',
			])
		</div>
	</div>
@endunless
<hr />
<div class="form-row d-flex justify-content-between align-items-center">
	<a href="{{ route($route) }}" class="btn btn-link">Cancelar</a>
	<button type="submit" class="btn btn-primary">{{ $button }}</a>
</div>