@if(Auth::user()->isSupervisor())
	<div class="row">
		<div class="col-3 mx-auto">
			<a href="#">
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
	</div>
@elseif(Auth::user()->isSeller())
	<div class="row">
		<div class="col-3 mx-auto">
			<a href="#">
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
@endif