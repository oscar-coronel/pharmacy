<?php

$fields = [
	'identification',
	'name',
	'cellphone',
	'lastname',
	'address',
	'date_of_birth',
	'email',
	'password',
];

$centinela = false;
$error_message = '';
?>
@if($errors->any())
	@foreach($errors->all() as $error)
		@if(strpos($error, 'reset'))
			<?php
				$centinela = true;
				$error_message = $error;
			?>
			@break
		@endif
	@endforeach
@endif


@foreach($fields as $field)
	@if($errors->has($field) || $centinela)
	  <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
	      <span aria-hidden="true">&times;</span>
	    </button>
	    <ul class="m-0 px-3">
	    	@if($centinela)
	    		<li>{{ $error_message }}</li>
	    	@else
		    	@foreach($fields as $other_field)
			    	@foreach($errors->get($other_field) as $error)
			    		<li>{{ $error }}</li>
			    	@endforeach
			    @endforeach
			@endif
	    </ul>
	  </div>
	  @break
	@endif
@endforeach