<?php

namespace App\Http\Controllers;

use App\Repositories\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $products;

    public function __construct(Products $products)
    {
        $this->middleware('auth');
        $this->products = $products;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function maintenance()
    {
        return view('maintenance');
    }

    public function transaction()
    {
        $products = $this->products->getProducts();
        return view('transaction', compact('products'));
    }

    public function report(Products $products)
    {
        return view('report', [
            'products' => $products->getProducts()
        ]);
    }
}
