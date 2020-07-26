<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productType')->get();
        $carts = Cart::all();
        return view('home', compact('products', 'carts'));
    }

    public function addToCart($productId, $cartId)
    {
        $product = Product::findOrFail($productId);
        $cart = Cart::findOrFail($cartId);
        $cartItem = CartItem::where('cart_id', $cartId)
                    ->where('product_id', $productId)->first();
        if(!$cartItem){
            CartItem::create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'count' => 1,
                'price' => $product->price,
                'total' => $product->price
            ]);
        }else{
            $count = ((int)$cartItem->count + 1);
            $cartItem->count = $count;
            $cartItem->price = $product->price;
            $cartItem->total = ($count * (float) $product->price);
            $cartItem->save();
        }
        dd('success');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
