<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;
class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'name'=> 'Normal item'
        ]);
        ProductType::create([
            'name'=> 'Sale item'
        ]);
    }
}
