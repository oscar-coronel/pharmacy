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

?>

@foreach($fields as $field)
	@if($errors->has($field))
	  <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
	      <span aria-hidden="true">&times;</span>
	    </button>
	    <ul class="m-0 px-3">
	    	@foreach($fields as $other_field)
		    	@foreach($errors->get($other_field) as $error)
		    		<li>{{ $error }}</li>
		    	@endforeach
		    @endforeach
	    </ul>
	  </div>
	  @break
	@endif
@endforeach