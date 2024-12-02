@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>

    <p class="mb-2">{{ $product->description }}</p>
    <p class="mb-2">Price: ${{ $product->price }}</p>
    <p class="mb-2">Stock: {{ $product->stock }}</p>
    <p class="mb-4">Category: {{ $product->category->name }}</p>

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button>
    </form>

    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Products</a>
@endsection