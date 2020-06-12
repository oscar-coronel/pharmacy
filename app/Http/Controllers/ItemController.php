<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

use App\Repositories\Items;
use App\Repositories\Providers;
use App\Repositories\ItemCategories;

use App\Http\Requests\SaveItem;

class ItemController extends Controller
{
	private $items;
	private $providers;
	private $categories;

	public function __construct(Items $items, Providers $providers,ItemCategories $categories)
	{
		$this->middleware(['auth', 'admin_supervisor']);
		$this->items = $items;
		$this->providers = $providers;
		$this->categories = $categories;
	}

	public function index(){
		$items = $this->items->index();
		return view('items.index', compact('items'));
	}

	public function create(){
		return view('items.create', [
			'item' => new Item,
			'providers' => $this->providers->index(),
			'categories' => $this->categories->index(),
		]);
	}

	public function store(SaveItem $request){
		$data = $request->validated();
		$item = $this->items->store($data);
		return redirect()->route('items.index')->with('status', 'Artículo creado con éxito.');
	}

	public function edit(Item $item){
    	return view('items.edit', [
    		'item' => $item,
    		'providers' => $this->providers->index(),
			'categories' => $this->categories->index(),
    	]);
    }

    public function update(SaveItem $request, Item $item){
    	$data = $request->validated();
        $this->items->update($item, $data);
        return redirect()->route('items.index')->with('status', 'Artículo actualizado con éxito.');
    }

    public function destroy(Item $item){
    	$this->items->destroy($item);
        return redirect()->route('items.index')->with('status', 'Artículo eliminado con éxito.');
    }

}
