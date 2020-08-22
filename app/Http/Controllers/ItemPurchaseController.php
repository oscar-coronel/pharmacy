<?php

namespace App\Http\Controllers;

use App\ItemPurchase;
use App\Repositories\ItemPurchases;
use App\Repositories\Products;
use App\Repositories\Providers;
use Illuminate\Http\Request;

class ItemPurchaseController extends Controller
{

	private $itemPurchases;
	private $providers;
	private $products;

	public function __construct(ItemPurchases $itemPurchases, Providers $providers, Products $products)
	{
		$this->middleware(['auth', 'admin_supervisor']);
		$this->itemPurchases = $itemPurchases;
		$this->providers = $providers;
		$this->products = $products;
	}

	public function index()
	{
		$itemPurchases = $this->itemPurchases->index();
		return view('purchases.index', compact('itemPurchases'));
	}

	public function create(){
		return view('purchases.create', [
			'purchase' => new ItemPurchase,
			'providers' => $this->providers->index(),
		]);
	}

	public function store(){
		$details = $_POST['detail'];

		$purchase_data = $_POST['headboard'];
		$purchase_data['pharmacy_address'] = config('app.address');
		$purchase_data['user_id'] = auth()->id();

		$isUniqueCode = $this->itemPurchases->isUniquePurchaseCode($purchase_data['purchase_code']);
		$response = ['value' => $isUniqueCode];

		if ($isUniqueCode) {
			$itemPurchase = $this->itemPurchases->create($purchase_data);
			foreach ($details as $row) {
				$itemPurchase->itemPurchaseDetails()->create($row);

				$item_id = $row['item_id'];
				$quantity = intval($row['quantity']);

				$data = [];
				$product = $this->products->getByItemId($item_id);
				if (is_null($product)) {
					$data['stock'] = $quantity;
					$data['item_id'] = $item_id;
					$data['price'] = 0;
					$this->products->create($data);
				} else {
					$quantity += $product->stock;
					$data['stock'] = $quantity;
					$this->products->update($product, ['stock' => $quantity]);
				}

			}
		}

		return response()->json($response);
	}

	public function destroy(ItemPurchase $purchase)
	{
		$data = ['state' => '0'];
		$this->itemPurchases->update($purchase, $data);
		foreach ($purchase->itemPurchaseDetails as $detail) {
			$detail_quantity = $detail->quantity;
			$product = $detail->item->product;
			$product->stock -= $detail_quantity;
			$product->save();
		}

		return back()->with('status', 'La compra se ha anulado con éxito.');
	}

}
