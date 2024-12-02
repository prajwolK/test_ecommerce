<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::with('category');

        if(request()->has('category_id')){
            $query->where('category_id',request('category_id'));
        }

        $products = $query->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id); 
        return view('products.show', compact('product'));
    }
}
