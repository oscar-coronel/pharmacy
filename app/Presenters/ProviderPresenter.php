<?php

namespace App\Presenters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProviderPresenter extends Presenter{

	public function dateOfBirth(){
		$year = date('Y',strtotime($this->model->date_of_birth));
		$month = date('m',strtotime($this->model->date_of_birth));
		$day = date('d',strtotime($this->model->date_of_birth));
		return Carbon::createFromDate($year, $month, $day);
	}

	public function oldValueForForm(){
		return !empty($this->model->date_of_birth) ? $this->dateOfBirth()->format('Y-m-d') : '';
	}

}

?>