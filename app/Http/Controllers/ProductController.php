<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	private $products;

    public function __construct(Products $products){
    	$this->middleware(['auth', 'admin_supervisor']);
    	$this->products = $products;
    }

	public function updatePrice(Product $product){
		$price = $_POST['price'];
		$data = [
			'price' => $price
		];
		$this->products->update($product, $data);
		return response()->json([
			'products' => $this->products->getProducts()
		]);
	}

}
