<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAuthUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function update(SaveAuthUser $request, User $user){
    	$data = $request->validated();
    	$user->update($data);
    	return back()->with('status','Datos actualizados con éxito.');
    }
}
