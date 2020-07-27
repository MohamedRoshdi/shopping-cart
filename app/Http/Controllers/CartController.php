<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        return view('carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'items' => 'array',
            'items.*' => 'numeric|min:1',
        ]);
        foreach ($request->items as $key => $value) {
            $item = CartItem::find($key);
            if ($item) {
                $item->count = $value;
                $item->total = ((int) $value * (float) $item->price);
                $item->save();
            }
        }
        return redirect()->route('cart.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function emptyCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->items()->delete();
        return redirect()->back();
    }

    public function deleteItem($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
