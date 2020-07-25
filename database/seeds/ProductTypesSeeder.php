<?php

use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductType::create([
            'name'=> 'Normal item'
        ]);
        \App\ProductType::create([
            'name'=> 'Sale item'
        ]);
    }
}
