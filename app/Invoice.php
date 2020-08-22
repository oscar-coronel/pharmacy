<?php

namespace App;

use App\Customer;
use App\InvoiceDetail;
use App\PaymentType;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    protected $table = 'invoices';

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function paymentType(){
        return $this->belongsTo(PaymentType::class, 'payment_type_id', 'id');
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id')
                    ->where('invoice_details.state', '=', '1');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->with(['invoiceDetails', 'user', 'customer'])
                    ->where($this->getRouteKeyName(), '=', $value)
                    ->where('state', '=', '1')
                    ->first();
    }

}
