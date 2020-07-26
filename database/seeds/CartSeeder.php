<?php

use Illuminate\Database\Seeder;
use App\Models\Cart;
class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'name'=> 'Order cart',
        ]);
        Cart::create([
            'name'=> 'Wish-list cart',
        ]);
    }
}
