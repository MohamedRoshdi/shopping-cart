<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'Laptop HP',
            'price'=>12000,
            'product_type_id'=>1,
            'image'=>'images/hp.jpg',
        ]);
        Product::create([
            'name'=>'Laptop Dell',
            'price'=>15000,
            'product_type_id'=>2,
            'image'=>'images/dell.jpg',
        ]);
        Product::create([
            'name'=>'Laptop MAC',
            'price'=>25000,
            'product_type_id'=>1,
            'image'=>'images/mac.jpg',
        ]);
        Product::create([
            'name'=>'Laptop',
            'price'=>5000,
            'product_type_id'=>1,
        ]);
    }
}
