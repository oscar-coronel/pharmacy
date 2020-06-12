<?php

namespace App\Repositories;

use App\Item;

class Items{
	public function index(){
		return Item::with(['provider', 'category'])
						->where('state','=',1)
                        ->latest()
                        ->get();
	}

	public function store($data){
		return Item::create([
            'name' => $data['item_name'],
            'brand' => $data['brand'],
            'price' => $data['price'],
            'is_iva' => $data['is_iva'],
            'provider_id' => $data['provider_id'],
            'item_category_id' => $data['item_category_id']
        ]);
	}

	public function update(Item $item, $data){
		$item->update([
            'name' => $data['item_name'],
            'brand' => $data['brand'],
            'price' => $data['price'],
            'is_iva' => $data['is_iva'],
            'provider_id' => $data['provider_id'],
            'item_category_id' => $data['item_category_id']
        ]);
	}

	public function destroy(Item $item){
		$item->update([
            'state' => '0',
        ]);
	}
}

?>