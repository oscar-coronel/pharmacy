<?php

namespace App;

use App\Item;
use App\Presenters\ProductPresenter;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'products';

    public function item(){
    	return $this->belongsTo(Item::class, 'item_id', 'id')
                    ->with(['provider', 'itemPurchaseDetails', 'invoiceDetails']);
    }

    public function presenter(){
    	return new ProductPresenter($this);
    }

    public function resolveRouteBinding($value, $field = null){
    	return $this->with(['item'])->where($this->getRouteKeyName(), '=', $value)
    			->where('state', '=', '1')
    			->first();
    }

}
