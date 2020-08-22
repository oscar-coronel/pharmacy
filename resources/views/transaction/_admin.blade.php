<div class="row mb-3">
	<div class="col-12 text-center">
		<figure>
			<img src="/img/wholesale.svg" class="img-fluid" style="height: 70px; cursor: pointer;" data-toggle="modal" data-target="#stock_modal" />
			<figcaption class="text-dark font-weight-bold">Stock</figcaption>
		</figure>
	</div>
</div>

<div class="row">
	<div class="col-3 offset-2">
		<a href="{{ route('purchases.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-secondary text-white text-center" style="font-size: 20px;">
			  	Compras
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/shopping-cart.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
	<div class="col-3 offset-2">
		<a href="{{ route('invoices.index') }}">
			<div class="card" style="cursor: pointer;">
			  <div class="card-header bg-primary text-white text-center" style="font-size: 20px;">
			  	Facturación
			  </div>
			  <div class="card-body text-center">
		  		<img src="/img/bill.svg" class="img-fluid" style="height: 150px; width: 150px;" />
			  </div>
			</div>
		</a>
	</div>
</div>