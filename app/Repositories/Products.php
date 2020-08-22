<?php

namespace App\Repositories;

use App\Product;

class Products
{

	public function getProducts(){
		return Product::with(['item'])
					->where('state', '=', '1')
					->latest()
					->get();
	}

	public function getProductsForInvoice(){
		return Product::with(['item'])
					->where('state', '=', '1')
					->where('stock', '>', 0)
					->where('price', '>', 0)
					->latest()
					->get();
	}

	public function create($data){
		return Product::create($data);
	}

	public function getByItemId($item_id){
		return Product::where('item_id', '=', $item_id)
					->where('state', '=', '1')
					->first();
	}

	public function update($product, $data){
		$product->update($data);
	}

}

?>