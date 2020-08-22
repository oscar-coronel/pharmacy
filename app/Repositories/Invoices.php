<?php

namespace App\Repositories;

use App\Invoice;


class Invoices{

	public function index()
	{
		return Invoice::with(['user', 'customer','invoiceDetails'])
					->where('state', '=', '1')
					->latest()
					->get();
	}

	public function isUniqueInvoiceCode($code){
		return Invoice::where('invoice_code', '=', $code)
					->get()
					->count() == 0;
	}

	public function create($data){
		return Invoice::create($data);
	}

	public function update($invoice, $data)
	{
		$invoice->update($data);
	}

	public function getForBoxClosure($date)
	{
		return Invoice::with(['user', 'customer','invoiceDetails', 'paymentType'])
					->where('state', '=', '1')
					->whereDate('created_at', '=', $date)
					->latest()
					->get();
	}

}


?>