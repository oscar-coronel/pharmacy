<?php

namespace App\Repositories;

use App\Customer;

class Customers{

	public function index(){
		return Customer::where('state','=',1)
                        ->latest()
                        ->get();
	}

	public function store($data){
		return Customer::create([
	            'identification' => $data['user_identification'],
	            'name' => $data['user_name'],
	            'lastname' => $data['user_lastname'],
	            'cellphone' => $data['user_cellphone'],
	            'address' => $data['user_address'],
	            'date_of_birth' => $data['user_date_of_birth'],
	            'email' => $data['user_email']
        ]);
	}

	public function update(Customer $customer, $data){
		$customer->update([
            'identification' => $data['user_identification'],
            'name' => $data['user_name'],
            'lastname' => $data['user_lastname'],
            'cellphone' => $data['user_cellphone'],
            'address' => $data['user_address'],
            'date_of_birth' => $data['user_date_of_birth'],
            'email' => $data['user_email']
        ]);
	}

	public function destroy(Customer $customer){
		$customer->update([
            'state' => '0',
        ]);
	}

}

?>