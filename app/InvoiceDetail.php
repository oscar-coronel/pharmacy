<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $guarded = [];
    protected $table = 'invoice_details';

    public function item(){
    	return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function invoice(){
    	return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

}
