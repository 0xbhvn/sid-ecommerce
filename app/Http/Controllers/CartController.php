<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sum = 0;
        $items = Cart::where('user_id', auth()->id())->get();

        return view('cart.index', compact('items', 'sum'));
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
    public function store(Request $request, Product $product)
    {
        if(Cart::where('user_id', auth()->id())->where('product_id', $product->id)->exists())
        {
            Cart::where('user_id', auth()->id())->where('product_id', $product->id)->increment('quantity');
        }
        else
        {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);
        }

        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $quantity = request('quantity');
        Cart::where('id', $cart->id)->update(['quantity' => $quantity]);

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Product $product)
    {
        Cart::where('id', $cart->id)->delete();

        return redirect('/cart');
    }
}
