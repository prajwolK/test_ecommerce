<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $products = $cartItems
            ? \App\Models\Product::whereIn('id', array_keys($cartItems))->get()
            : collect();

        return view('cart.index', compact('products', 'cartItems'));
    }

    public function add(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' =>1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', '{$product->name} added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}