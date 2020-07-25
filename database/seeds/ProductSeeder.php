<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name'=>'Laptop HP',
            'price'=>12000,
            'product_type_id'=>1,
            'image'=>'hp.jpg',
        ]);
        \App\Product::create([
            'name'=>'Laptop Dell',
            'price'=>15000,
            'product_type_id'=>2,
            'image'=>'dell.jpg',
        ]);
        \App\Product::create([
            'name'=>'Laptop MAC',
            'price'=>25000,
            'product_type_id'=>1,
            'image'=>'mac.jpg',
        ]);
    }
}
