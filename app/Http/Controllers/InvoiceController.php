<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Repositories\Customers;
use App\Repositories\Invoices;
use App\Repositories\PaymentTypes;
use App\Repositories\Products;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

	private $invoices;
	private $customers;
	private $products;

	public function __construct(Invoices $invoices, Customers $customers, Products $products)
	{
		$this->middleware(['auth', 'admin_seller']);
		$this->invoices = $invoices;
		$this->customers = $customers;
		$this->products = $products;
	}

	public function index()
	{
		$invoices = $this->invoices->index();
		return view('invoices.index', compact('invoices'));
	}

	public function create(PaymentTypes $paymentTypes){

		return view('invoices.create', [
			'invoice' => new Invoice,
			'customers' => $this->customers->index(),
			'products' => $this->products->getProductsForInvoice(),
			'paymentTypes' => $paymentTypes->getPaymentTypes(),
		]);
	}

	public function store(){
		$details = $_POST['detail'];

		$invoice_data = $_POST['headboard'];
		$invoice_data['pharmacy_address'] = config('app.address');
		$invoice_data['user_id'] = auth()->id();

		$isUniqueCode = $this->invoices->isUniqueInvoiceCode($invoice_data['invoice_code']);
		$response = ['value' => $isUniqueCode];

		if ($isUniqueCode) {
			$invoice = $this->invoices->create($invoice_data);
			$response['invoice_id'] = $invoice->id;
			foreach ($details as $row) {
				$invoice->invoiceDetails()->create($row);

				$item_id = $row['item_id'];
				$quantity = intval($row['quantity']);

				$product = $this->products->getByItemId($item_id);

				$product->stock -= $quantity;
				$product->save();
			}
		}

		return response()->json($response);
	}

	public function destroy(Invoice $invoice)
	{
		$data = ['state' => '0'];
		$this->invoices->update($invoice, $data);
		foreach ($invoice->invoiceDetails as $detail) {
			$detail_quantity = $detail->quantity;
			$product = $detail->item->product;
			$product->stock += $detail_quantity;
			$product->save();
		}

		return back()->with('status', 'La factura se ha anulado con éxito.');
	}

	public function pdf(Invoice $invoice)
	{
		$pdf = resolve('dompdf.wrapper');
		$pdf = $pdf->loadView('pdf.invoice', compact('invoice'));
		$pdf->setPaper('A4', 'portrait');
		return $pdf->stream();
	}

}
