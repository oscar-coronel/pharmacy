<?php

namespace App\Repositories;

use App\PaymentType;


class PaymentTypes{

	public function getPaymentTypes(){
		return PaymentType::where('state', '=', '1')
					->latest()
					->get();
	}

}

?>