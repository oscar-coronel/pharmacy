<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class ProductPresenter extends Presenter
{

	public function iva()
	{
		$is_iva = $this->model->item->is_iva == 1;
		if ($is_iva) {
			return new HtmlString('<img src="/img/checked.svg" style="height: 30px;" />');
		}
		return '';
	}

	public function stock()
	{
		$stock = $this->model->stock;
		$class = $stock > 3 ? 'badge-success' : 'badge-danger';
		return new HtmlString('<span class="badge badge-pill '.$class.'">'.$stock.'</span>');
	}

	public function price()
	{
		return new HtmlString('<a href="#" data-toggle="modal" data-target="#price_modal" onclick="pushProduct('.$this->model->id.');">'.$this->model->price.'</a>');
	}

}

?>