<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSeller;
use App\Http\Requests\SaveSupervisor;
use App\Http\Requests\SaveUser;
use App\Http\Requests\UpdateSeller;
use App\Http\Requests\UpdateSupervisor;
use App\Http\Requests\UpdateUserPassword;
use App\Repositories\Users;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users;


	public function __construct(Users $users)
	{
		$this->middleware('auth');

        $this->middleware('admin')
                ->only('supervisorIndex','supervisorCreate','supervisorStore','supervisorEdit','supervisorUpdate','supervisorDestroy','resetPassword');

        $this->middleware('admin_supervisor')
                ->only('sellerIndex','sellerCreate','sellerStore','sellerEdit','sellerUpdate','sellerDestroy');

        $this->users = $users;
	}

    public function update(SaveUser $request, $user){
    	$this->authorize('isSameUser', $user);
    	$data = $request->validated();
    	$this->users->update($user, $data);
    	return back()->with('status','Datos actualizados con éxito.');
    }

    public function updatePassword(UpdateUserPassword $request, $user){
    	$this->authorize('isSameUser', $user);
    	$data = $request->validated();
    	$this->users->update($user, $data);
    	return back()->with('status','Contraseña actualizada con éxito.');
    }

    public function resetPassword(User $user){
        $key = 'password_reset_'.$user->id;
        $data = request()->validate([
            $key => 'required|confirmed',
        ]);
        $this->users->updatePassword($user, 'password', $data[$key]);
        return back()->with('status','Contraseña restablecida con éxito.');
    }








    public function supervisorIndex(){
        $users = $this->users->supervisorIndex();
        return view('users.supervisor-index', compact('users'));
    }

    public function supervisorCreate(){
        return view('users.supervisor-create', [
            'user' => new User
        ]);
    }

    public function supervisorStore(SaveSupervisor $request){
        $data = $request->validated();
        $user = $this->users->supervisorStore($data);
        return redirect()->route('users.supervisor.index')->with('status', 'Supervisor creado con éxito.');
    }

    public function supervisorEdit($supervisor){
        return view('users.supervisor-edit', [
            'user' => $supervisor
        ]);
    }

    public function supervisorUpdate(UpdateSupervisor $request, $supervisor){
        $data = $request->validated();
        $this->users->supervisorUpdate($supervisor, $data);
        return redirect()->route('users.supervisor.index')->with('status', 'Supervisor actualizado con éxito.');
    }

    public function supervisorDestroy($supervisor){
        $this->users->supervisorDestroy($supervisor);
        return redirect()->route('users.supervisor.index')->with('status', 'Supervisor eliminado con éxito.');
    }



    public function sellerIndex(){
        $users = $this->users->sellerIndex();
        return view('users.seller-index', compact('users'));
    }

    public function sellerCreate(){
        return view('users.seller-create', [
            'user' => new User
        ]);
    }

    public function sellerStore(SaveSeller $request){
        $data = $request->validated();
        $user = $this->users->sellerStore($data);
        return redirect()->route('users.seller.index')->with('status', 'Vendedor creado con éxito.');
    }

    public function sellerEdit($seller){
        return view('users.seller-edit', [
            'user' => $seller
        ]);
    }

    public function sellerUpdate(UpdateSeller $request, $seller){
        $data = $request->validated();
        $this->users->sellerUpdate($seller, $data);
        return redirect()->route('users.seller.index')->with('status', 'Vendedor actualizado con éxito.');
    }

    public function sellerDestroy($seller){
        $this->users->sellerDestroy($seller);
        return redirect()->route('users.seller.index')->with('status', 'Vendedor eliminado con éxito.');
    }

}
