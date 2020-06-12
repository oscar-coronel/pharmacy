<div class="row">
	<div class="col-3">
		<a href="{{ route('users.seller.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-info text-white text-center" style="font-size: 20px;">
			  	Vendedores
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/cashier.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
	<div class="col-3">
		<a href="{{ route('customers.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-warning text-dark text-center" style="font-size: 20px;">
			  	Clientes
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/customer.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
	<div class="col-3">
		<a href="{{ route('items.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-primary text-white text-center" style="font-size: 20px;">
			  	Artículos
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/trolley.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
	<div class="col-3">
		<a href="{{ route('providers.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-secondary text-white text-center" style="font-size: 20px;">
			  	Proveedores
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/provider.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
</div>