<?php

namespace App;

use App\InvoiceDetail;
use App\ItemCategory;
use App\ItemPurchaseDetail;
use App\Product;
use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    protected $table = 'items';

    public function provider(){
    	return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    public function category(){
    	return $this->belongsTo(ItemCategory::class, 'item_category_id', 'id');
    }

    public function product(){
    	return $this->hasOne(Product::class, 'item_id', 'id')
    				->where('products.state', '=', '1');
    }

    public function itemPurchaseDetails(){
        return $this->hasMany(ItemPurchaseDetail::class, 'item_id', 'id')->with('itemPurchase');
    }

    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetail::class, 'item_id', 'id')->with('invoice');
    }

}
