<?php

namespace App;

use App\Presenters\CustomerPresenter;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    public function presenter(){
        return new CustomerPresenter($this);
    }
}
