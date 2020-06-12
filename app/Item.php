<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;
use App\ItemCategory;

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

}
