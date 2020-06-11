<?php

namespace App\Repositories;

use App\User;

class Users{
	private $paginate = 7;


	public function update(User $user, $data){
		$user->update($data);
	}


	public function supervisorIndex(){
		return User::with(['role'])
                        ->where('state','=',1)
                        ->where('role_id','=',2)
                        ->latest()
                        ->paginate($this->paginate);
	}

	public function supervisorStore($data){
		return User::create([
	            'identification' => $data['user_identification'],
	            'name' => $data['user_name'],
	            'lastname' => $data['user_lastname'],
	            'cellphone' => $data['user_cellphone'],
	            'address' => $data['user_address'],
	            'date_of_birth' => $data['user_date_of_birth'],
	            'email' => $data['user_email'],
	            'password' => $data['user_password'],
	            'role_id' => 2
        ]);
	}

	public function supervisorUpdate(User $user, $data){
		$user->update([
            'identification' => $data['user_identification'],
            'name' => $data['user_name'],
            'lastname' => $data['user_lastname'],
            'cellphone' => $data['user_cellphone'],
            'address' => $data['user_address'],
            'date_of_birth' => $data['user_date_of_birth'],
            'email' => $data['user_email'],
        ]);
	}

	public function supervisorDestroy(User $user){
		$user->update([
            'state' => '0',
        ]);
	}


	public function sellerIndex(){
		return User::with(['role'])
                        ->where('state','=',1)
                        ->where('role_id','=',3)
                        ->latest()
                        ->paginate($this->paginate);
	}

	public function sellerStore($data){
		return User::create([
	            'identification' => $data['user_identification'],
	            'name' => $data['user_name'],
	            'lastname' => $data['user_lastname'],
	            'cellphone' => $data['user_cellphone'],
	            'address' => $data['user_address'],
	            'date_of_birth' => $data['user_date_of_birth'],
	            'email' => $data['user_email'],
	            'password' => $data['user_password'],
	            'role_id' => 3
        ]);
	}

	public function sellerUpdate(User $user, $data){
		$user->update([
            'identification' => $data['user_identification'],
            'name' => $data['user_name'],
            'lastname' => $data['user_lastname'],
            'cellphone' => $data['user_cellphone'],
            'address' => $data['user_address'],
            'date_of_birth' => $data['user_date_of_birth'],
            'email' => $data['user_email'],
        ]);
	}

	public function sellerDestroy(User $user){
		$user->update([
            'state' => '0',
        ]);
	}

}


?>