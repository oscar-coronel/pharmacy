@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-3 offset-2">
			<a href="#">
				<div class="card" style="cursor: pointer;">
				  <div class="card-header bg-success text-white text-center" style="font-size: 20px;">
				  	Cierre de Caja
				  </div>
				  <div class="card-body text-center">
			  		<img src="/img/money.svg" class="img-fluid" style="height: 150px; width: 150px;" />
				  </div>
				</div>
			</a>
		</div>
		<div class="col-3 offset-2">
			<a href="#">
				<div class="card" style="cursor: pointer;">
				  <div class="card-header bg-info text-white text-center" style="font-size: 20px;">
				  	Kardex
				  </div>
				  <div class="card-body text-center">
			  		<img src="/img/payment.svg" class="img-fluid" style="height: 150px; width: 150px;" />
				  </div>
				</div>
			</a>
		</div>
	</div>
@endsection