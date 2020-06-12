@csrf
<h4 class="text-center text-primary">{{ $main_title }}</h4>
<hr />
<div class="form-row">
	<div class="form-group col-5">
		<label for="ruc">RUC</label>
		@include('providers._input',[
			'type' => 'text',
			'name' => 'ruc',
			'placeholder' => 'RUC',
			'old_value' => $user->ruc,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_name">Nombres</label>
		@include('providers._input',[
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
		@include('providers._input',[
			'type' => 'text',
			'name' => 'user_cellphone',
			'placeholder' => 'Celular',
			'old_value' => $user->cellphone,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_lastname">Apellidos</label>
		@include('providers._input',[
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
		@include('providers._input',[
			'type' => 'text',
			'name' => 'user_address',
			'placeholder' => 'Dirección de Domicilio',
			'old_value' => $user->address,
		])
	</div>
	<div class="form-group col-5 offset-2">
		<label for="user_date_of_birth">Fecha de Nacimiento</label>
		@include('providers._input',[
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
		@include('providers._input',[
			'type' => 'text',
			'name' => 'user_email',
			'placeholder' => 'Correo Electrónico',
			'old_value' => $user->email,
		])
	</div>
</div>
<hr />
<div class="form-row d-flex justify-content-between align-items-center">
	<a href="{{ route($route) }}" class="btn btn-link">Cancelar</a>
	<button type="submit" class="btn btn-primary">{{ $button }}</a>
</div>