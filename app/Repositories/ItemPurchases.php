<?php

namespace App\Repositories;

use App\ItemPurchase;

class ItemPurchases{

	public function index()
	{
		return ItemPurchase::with(['user', 'provider','itemPurchaseDetails'])
					->where('state', '=', '1')
					->latest()
					->get();
	}

	public function isUniquePurchaseCode($code){
		return ItemPurchase::where('purchase_code', '=', $code)
					->get()
					->count() == 0;
	}

	public function create($data){
		return ItemPurchase::create($data);
	}

	public function update($purchase, $data)
	{
		$purchase->update($data);
	}

}

?>