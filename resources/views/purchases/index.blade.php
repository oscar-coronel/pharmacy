@extends('layouts.app')

@section('content')
	<div class="row mb-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12 d-flex justify-content-between align-items-center">
					<h1 class="mb-0 text-primary">Listado de Compras</h1>
					<a href="{{ route('purchases.create') }}" class="btn btn-primary">
						<span>Crear</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div>
				<table class="table table-striped table-bordered w-100">
					<thead class="table-success">
						<tr>
							<th>Código</th>
							<th>Subtotal</th>
							<th>IVA</th>
							<th>Total</th>
							<th>Usuario</th>
							<th>Proveedor</th>
							<th class="text-center">Detalle</th>
							<th class="text-center">Anular</th>
						</tr>
					</thead>
					<tbody>
						@foreach($itemPurchases as $itemPurchase)
							<tr>
								<td>{{ $itemPurchase->purchase_code }}</td>
								<td>{{ $itemPurchase->subtotal }}</td>
								<td>{{ $itemPurchase->iva_value }}</td>
								<td>{{ $itemPurchase->total }}</td>
								<td>{{ $itemPurchase->user->name }}</td>
								<td>{{ $itemPurchase->provider->name }}</td>
								<td class="text-center">
									<img src="/img/detail.svg" title="Ver Detalle" style="height: 30px; cursor: pointer;" data-toggle="modal" data-target="#detail_modal" onclick="seeDetail({{ $itemPurchase->itemPurchaseDetails }})" />
								</td>
								<td class="text-center">
									<a href="#" onclick="event.preventDefault(); deleteInfo(this, '¿Desea Anular la Compra?');" title="Anular">
										<img src="/img/cancel.svg" style="height: 30px;" />
									</a>
									<form method="POST" action="{{ route('purchases.destroy', $itemPurchase) }}" class="d-none">
										@csrf @method('DELETE')
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="detail_modal_title" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<img src="/img/detail.svg" style="height: 30px;" />
	        <h5 class="modal-title ml-2" id="detail_modal_title">Detalle</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="detail_content">
	        <div class="overflow-auto">
	        	<table class="table table-bordered table-hover">
	        		<thead>
	        			<tr>
	        				<th>Nombre</th>
	        				<th>Cantidad</th>
	        				<th>Precio</th>
	        				<th>Subtotal</th>
	        				<th>IVA</th>
	        				<th>Total</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        		</tbody>
	        		<tfoot>
	        			<tr>
	        				<th colspan="3" class="text-center">Totales</th>
	        				<th class="text-right" id="subtotal_final"></th>
	        				<th class="text-right" id="iva_final"></th>
	        				<th class="text-right" id="total_final"></th>
	        			</tr>
	        		</tfoot>
	        	</table>
	        </div>
	      </div>
	      <div class="modal-footer d-flex justify-content-center">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="{{ mix('js/purchase.js') }}" defer></script>

@endsection