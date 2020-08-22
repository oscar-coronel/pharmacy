<?php

namespace App;

use App\Item;
use App\ItemPurchase;
use Illuminate\Database\Eloquent\Model;

class ItemPurchaseDetail extends Model
{
    protected $guarded = [];
    protected $table = 'item_purchase_details';

    public function item(){
    	return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function itemPurchase(){
    	return $this->belongsTo(ItemPurchase::class, 'item_purchase_id', 'id');
    }

}
