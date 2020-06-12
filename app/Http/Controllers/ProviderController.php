<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Providers;
use App\Provider;
use App\Http\Requests\SaveProvider;
use App\Http\Requests\UpdateProvider;

class ProviderController extends Controller
{
    private $providers;

	public function __construct(Providers $providers)
	{
		$this->middleware(['auth', 'admin_supervisor']);
		$this->providers = $providers;
	}

	public function index(){
		$users = $this->providers->index();
		return view('providers.index', compact('users'));
	}

	public function create(){
		return view('providers.create', [
            'user' => new Provider
        ]);
    }

    public function store(SaveProvider $request){
    	$data = $request->validated();
    	$user = $this->providers->store($data);
        return redirect()->route('providers.index')->with('status', 'Proveedor creado con éxito.');
    }

    public function edit(Provider $provider){
    	return view('providers.edit', [
            'user' => $provider
        ]);
    }

    public function update(UpdateProvider $request, Provider $provider){
    	$data = $request->validated();
        $this->providers->update($provider, $data);
        return redirect()->route('providers.index')->with('status', 'Proveedor actualizado con éxito.');
    }

    public function destroy(Provider $provider){
    	$this->providers->destroy($provider);
        return redirect()->route('providers.index')->with('status', 'El proveedor y sus artículos fueron eliminados con éxito.');
    }
}
