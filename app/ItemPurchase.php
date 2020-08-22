<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Provider;

class ItemPurchase extends Model
{
    protected $guarded = [];
    protected $table = 'item_purchases';

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function provider()
    {
    	return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    public function itemPurchaseDetails()
    {
        return $this->hasMany(ItemPurchaseDetail::class, 'item_purchase_id', 'id')
                    ->where('item_purchase_details.state', '=', '1');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->with(['itemPurchaseDetails'])
                    ->where($this->getRouteKeyName(), '=', $value)
                    ->where('state', '=', '1')
                    ->first();
    }

}
