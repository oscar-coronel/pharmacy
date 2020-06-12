<?php

namespace App;

use App\Presenters\ProviderPresenter;
use Illuminate\Database\Eloquent\Model;
use App\Item;

class Provider extends Model
{
    protected $guarded = [];
    protected $table = 'providers';

    public function presenter(){
        return new ProviderPresenter($this);
    }

    public function items(){
    	return $this->hasMany(Item::class, 'provider_id', 'id');
    }
}
