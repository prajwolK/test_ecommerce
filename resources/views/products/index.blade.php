@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="border rounded-lg shadow-md p-4">
            <img src="https://cdn.gadgetbytenepal.com/wp-content/uploads/2022/04/iPhone-12-Blue.jpg" alt="{{ $product->name }}" class="w-full rounded-md mb-4">
            <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-lg font-bold mt-2">${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">
                    Add to Cart
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
