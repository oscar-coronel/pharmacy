@extends('layouts.app')

@section('content')

	@if(Auth::user()->isAdmin())
		@include('transaction._admin')
	@else
		@include('transaction._supervisor_seller')
	@endif

	@if(Auth::user()->isAdmin() || Auth::user()->isSupervisor())
		<!-- Modal -->
		<div class="modal fade" id="stock_modal" tabindex="-1" role="dialog" aria-labelledby="stock_modal_title" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="stock_modal_title">Stock de Artículos</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div>
		      		<table id="stock_table" class="table table-bordered table-hover">
		      			<thead>
		      				<tr>
		      					<th class="text-center">#</th>
		      					<th class="text-center">Nombre</th>
		      					<th class="text-center">Precio de Venta</th>
		      					<th class="text-center">Stock</th>
		      					<th class="text-center">IVA</th>
		      				</tr>
		      			</thead>
		      			<tbody>
		      				@foreach($products as $index => $product)
		      					<tr>
		      						<td class="text-center">{{ $index + 1 }}</td>
		      						<td>{{ $product->item->name }}</td>
		      						<td class="text-right">{{ $product->presenter()->price() }}</td>
		      						<td class="text-center">{{ $product->presenter()->stock() }}</td>
		      						<td class="text-center">{{ $product->presenter()->iva() }}</td>
		      					</tr>
		      				@endforeach
		      			</tbody>
		      		</table>
		      	</div>
		      </div>
		      <div class="modal-footer d-flex justify-content-center">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
		      </div>
		    </div>
		  </div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="price_modal" tabindex="-1" role="dialog" aria-labelledby="price_modal_title" aria-hidden="true">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="background: black;">
		        <h5 class="modal-title text-white" id="price_modal_title">Precio de Venta</h5>
		        <button type="button" class="close" id="price_modal_close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="text-white">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" style="background: teal;">
		        <div class="form-row form-group text-center d-block text-white" id="product_title" style="font-size: 17px; font-weight: 200 !important;">
		        </div>
		        <div class="form-row form-group">
		        	<div class="input-group">
		        		<div class="input-group-prepend">
		        			<span class="input-group-text">Precio:</span>
		        		</div>
		        		<input type="price" name="price" id="price" class="form-control" onkeypress="return validateDouble(event, this);" />
		        		<div class="input-group-append">
		        			<button type="button" class="btn btn-primary" onclick="savePrice();">
		        				Guardar
		        			</button>
		        		</div>
		        	</div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<script src="{{ mix('js/transaction.js') }}" defer></script>
		<script>
			var products = {!! $products !!};
		</script>
	@endif

@endsection