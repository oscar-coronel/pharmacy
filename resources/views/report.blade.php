@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-3 offset-2">
			<div class="card" style="cursor: pointer;" data-toggle="modal" data-target="#box_modal">
			  <div class="card-header bg-success text-white text-center" style="font-size: 20px;">
			  	Cierre de Caja
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/money.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</div>
		<div class="col-3 offset-2">
			<div class="card" style="cursor: pointer;" data-toggle="modal" data-target="#kardex_modal">
			  <div class="card-header bg-info text-white text-center" style="font-size: 20px;">
			  	Kardex
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/payment.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="box_modal" tabindex="-1" role="dialog" aria-labelledby="box_modal_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="box_modal_title">Cierre de Caja</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="input-group">
	        	<div class="input-group-prepend">
	        		<span class="input-group-text">Fecha:</span>
	        	</div>
	        	<input type="date" name="date_of_box" id="date_of_box" class="form-control" value="{{ date('Y-m-d') }}" />
	        </div>
	      </div>
	      <div class="modal-footer d-flex justify-content-center">
	      	<button type="button" class="btn btn-info" id="watchBoxClosure">Mostrar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="kardex_modal" tabindex="-1" role="dialog" aria-labelledby="kardex_modal_title" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="kardex_modal_title">Kardex</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="input-group mb-3 d-none">
	        	<div class="input-group-prepend">
	        		<span class="input-group-text">Desde:</span>
	        	</div>
	        	<input type="date" name="date_since" id="date_since" class="form-control" value="{{ date('Y-m-d') }}" />
	        	<div class="input-group-prepend">
	        		<span class="input-group-text">Hasta:</span>
	        	</div>
	        	<input type="date" name="date_until" id="date_until" class="form-control" value="{{ date('Y-m-d') }}" />
	        </div>
	        <div class="input-group">
	        	<div class="input-group-prepend">
	        		<span class="input-group-text">Producto:</span>
	        	</div>
	        	<select class="selectpicker form-control" data-live-search="true" name="product" id="product">
	        		@foreach($products as $product)
	        			<option value="{{ $product->id }}">{{ $product->item->name }} - {{ $product->item->provider->name }}</option>
	        		@endforeach
	        	</select>
	        </div>
	      </div>
	      <div class="modal-footer d-flex justify-content-center">
	      	<button type="button" class="btn btn-info" id="watchKardex">Mostrar</button>
	      </div>
	    </div>
	  </div>
	</div>


@endsection