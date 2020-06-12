<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemCategory extends Model
{
    protected $guarded = [];
    protected $table = 'item_categories';

    public function items(){
    	return $this->hasMany(Item::class, 'item_category_id', 'id');
    }
}
