<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\SaveCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Repositories\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	private $customers;

	public function __construct(Customers $customers)
	{
		$this->middleware('auth');
		$this->customers = $customers;
	}

	public function index(){
		$users = $this->customers->index();
		return view('customers.index', compact('users'));
	}

	public function create(){
		return view('customers.create', [
            'user' => new Customer
        ]);
    }

    public function store(SaveCustomer $request){
    	$data = $request->validated();
    	$user = $this->customers->store($data);
        return redirect()->route('customers.index')->with('status', 'Cliente creado con éxito.');
    }

    public function edit($customer){
    	return view('customers.edit', [
            'user' => $customer
        ]);
    }

    public function update(UpdateCustomer $request, $customer){
    	$data = $request->validated();
        $this->customers->update($customer, $data);
        return redirect()->route('customers.index')->with('status', 'Cliente actualizado con éxito.');
    }

    public function destroy($customer){
    	$this->customers->destroy($customer);
        return redirect()->route('customers.index')->with('status', 'Cliente eliminado con éxito.');
    }
}
