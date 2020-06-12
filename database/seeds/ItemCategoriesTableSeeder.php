<?php

use App\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCategory::create([
        	'name' => 'Antídotos'
        ]);
        ItemCategory::create([
        	'name' => 'Analgésicos Opioides'
        ]);
        ItemCategory::create([
        	'name' => 'Analgésicos / Antipiréticos'
        ]);
        ItemCategory::create([
        	'name' => 'Antiepilécticos'
        ]);
        ItemCategory::create([
        	'name' => 'Antiparkinsoniano'
        ]);
        ItemCategory::create([
        	'name' => 'Antipsicóticos'
        ]);
        ItemCategory::create([
        	'name' => 'Ansiolíticos'
        ]);
        ItemCategory::create([
        	'name' => 'Antidepresivos'
        ]);
        ItemCategory::create([
        	'name' => 'Hipnótico / Sedante'
        ]);
        ItemCategory::create([
        	'name' => 'Anestésicos Generales'
        ]);
        ItemCategory::create([
        	'name' => 'Anestésicos Locales'
        ]);
        ItemCategory::create([
        	'name' => 'Antiácidos'
        ]);
        ItemCategory::create([
        	'name' => 'Antiulcerosos / Protector Gástrico'
        ]);
        ItemCategory::create([
        	'name' => 'Diuréticos / Antihipertensivos'
        ]);
        ItemCategory::create([
        	'name' => 'Mucolíticos'
        ]);
        ItemCategory::create([
        	'name' => 'Antitusivos'
        ]);
    }
}
