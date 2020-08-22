<?php

namespace App\Repositories;

use App\ItemCategory;

class ItemCategories{
	public function index(){
		return ItemCategory::where('state','=','1')
                        ->latest()
                        ->get();
	}
}


?>