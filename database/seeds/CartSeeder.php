<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cart::create([
            'name'=> 'Order cart',
        ]);
        \App\Cart::create([
            'name'=> 'Wish-list cart',
        ]);
    }
}
