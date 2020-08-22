<?php

namespace App\Repositories;

use App\Provider;

class Providers{

	public function index(){
		return Provider::with(['items'])
						->where('state','=','1')
                        ->latest()
                        ->get();
	}

	public function store($data){
		return Provider::create([
	            'ruc' => $data['ruc'],
	            'name' => $data['user_name'],
	            'lastname' => $data['user_lastname'],
	            'cellphone' => $data['user_cellphone'],
	            'address' => $data['user_address'],
	            'date_of_birth' => $data['user_date_of_birth'],
	            'email' => $data['user_email']
        ]);
	}

	public function update(Provider $provider, $data){
		$provider->update([
            'ruc' => $data['ruc'],
            'name' => $data['user_name'],
            'lastname' => $data['user_lastname'],
            'cellphone' => $data['user_cellphone'],
            'address' => $data['user_address'],
            'date_of_birth' => $data['user_date_of_birth'],
            'email' => $data['user_email']
        ]);
	}

	public function destroy(Provider $provider){
		$provider->update([
            'state' => '0',
        ]);

        $provider->items()->update([
        	'state' => '0',
        ]);
	}

}

?>