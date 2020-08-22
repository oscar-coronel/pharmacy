<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\Invoices;
use App\Repositories\ItemPurchases;
use Illuminate\Http\Request;

class KardexController extends Controller
{

	private $invoices;
	private $itemPurchases;

	public function __construct(ItemPurchases $itemPurchases, Invoices $invoices){
		$this->middleware('auth');
		$this->invoices = $invoices;
		$this->itemPurchases = $itemPurchases;
	}

	public function kardex(Product $product){
		$product_in_purchases = $product->item
			->itemPurchaseDetails->where('itemPurchase.state', '=', '1')->map(function($item, $key){
				return collect($item)->put('is_purchase', true)->all();
			});

		$product_in_invoices = $product->item
			->invoiceDetails->where('invoice.state', '=', '1')->map(function($item, $key){
				return collect($item)->put('is_purchase', false)->all();
			});

		$data = $product_in_purchases->merge($product_in_invoices)
								->sortBy('created_at')->values()->all();
		$pdf = resolve('dompdf.wrapper');
		$pdf->setPaper('A4', 'portrait');
		$pdf->loadView('pdf.kardex', compact('product', 'data'));
		return $pdf->stream();
	}

}
