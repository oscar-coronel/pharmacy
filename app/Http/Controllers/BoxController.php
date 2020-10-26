<?php

namespace App\Http\Controllers;

use App\Repositories\Invoices;
use Illuminate\Http\Request;

class BoxController extends Controller
{
	private $invoices;

	public function __construct(Invoices $invoices){
		$this->middleware('auth');
		$this->invoices = $invoices;
	}

	public function closure($date){
		$invoices = $this->invoices->getForBoxClosure($date);
		$pdf = resolve('dompdf.wrapper');
		$pdf->setPaper('A4', 'portrait');
		$pdf = $pdf->loadView('pdf.box_closure', compact('invoices'));
		return $pdf->stream();
	}
}
